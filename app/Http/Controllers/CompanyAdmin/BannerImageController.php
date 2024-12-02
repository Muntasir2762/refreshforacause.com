<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;
use Intervention\Image\Facades\Image;
use Exception;

class BannerImageController extends Controller
{
    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerImages = BannerImage::orderBy('id', 'desc')->get();
        return view('admin.banner.banner-index', compact(['bannerImages']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|min:1|max:2049'
        ], [
            'image.max' => 'Banner image cannot be more than 2Mb'
        ]);

        $bannerImage = new BannerImage();
        $totalBannerImages = BannerImage::count();

        if ($totalBannerImages >= 10) {
            return back()->with($this->errorAlert('You cannot add more than 10 banners for your website, please delete older banners to upload new ones'));
        }

        if ($request->hasFile('image')) {
            $reqFile = $request->file('image');
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $fileName = pathinfo($reqFile->getClientOriginalName(), PATHINFO_FILENAME);
            $bannerImageDir = BannerImage::IMAGE_DIR;
            $bannerImageName = $this->generateFileName($fileName, $fileExtension);

            try {
                Image::make($reqFile)
                    ->resize(1920, 400)
                    ->save($bannerImageDir . $bannerImageName);
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $bannerImage->image = $bannerImageDir . $bannerImageName;
        }

        $bannerImage->save();
        return back()->with($this->successAlert('Successfully Uploaded!'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bannerImage = BannerImage::findOrFail($id);
        if ($bannerImage->image && file_exists($bannerImage->image)) {
            unlink($bannerImage->image);
        }
        $bannerImage->delete();
        return back()->with($this->successAlert('Successfully Deleted!'));
    }
}
