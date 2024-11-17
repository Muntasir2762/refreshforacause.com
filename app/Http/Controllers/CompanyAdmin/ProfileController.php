<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    use AlertTrait, HelperTrait;

    public function index ()
    {
        return view('admin.profile.profile-index');
    }

    public function update (Request $request, string $id)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|string',
                'address' => 'nullable|string',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:129',
            ],
            [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'image.image' => 'The uploaded file must be an image.',
                'image.mimes' => 'Image must be a file of type: png, jpg, jpeg.',
                'image.max' => 'Image cannot exceed 129KB.',
            ]
        );

        $profile = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($profile->image && file_exists($profile->image)) {
                unlink($profile->image);
            }
            if ($profile->avatar_image && file_exists($profile->avatar_image)) {
                unlink($profile->avatar_image);
            }
            $reqFile = $request->file('image');
            $profileName = 'image';
            $avatarName = 'avatar';
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $newProfileImgName = $profileName . '.' . $fileExtension;
            $newAvatarImgName = $avatarName . '.' . $fileExtension;
            $profileDir = User::PROFILE_IMAGE_DIR;
            $avatarDir = User::AVATAR_IMAGE_DIR;
            try {
                Image::make($reqFile)
                    ->resize(150, 150)
                    ->save($profileDir . $newProfileImgName);

                Image::make($reqFile)
                    ->resize(40, 40)
                    ->save($avatarDir . $newAvatarImgName);    
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $profile->image = $profileDir.$newProfileImgName;
            $profile->avatar_image = $avatarDir.$newAvatarImgName;
        }

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->full_name_slug = Str::slug($profile->fullName);
        $profile->phone = $request->phone;
        $profile->address = $request->address;

        $profile->save();
        return back()->with($this->successAlert('Successfully updated!'));

    }
}
