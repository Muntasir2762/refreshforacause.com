<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Exception;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{

    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = SiteSetting::first();
        return view('admin.setting.site-index', compact([
            'setting'
        ]));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'nullable',
                'favicon' => 'nullable|image|mimes:png,jpg,jpeg|min:1|max:129',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg|min:1|max:129',
                'fold_logo' => 'nullable|image|mimes:png,jpg,jpeg|min:1|max:129',

            ],
            [
                'favicon.min' => 'Invalid favicon',
                'favicon.max' => 'Favicon cannot be more than 128Kb',
                'logo.min' => 'Invalid logo',
                'logo.max' => 'Logo cannot be more than 5Mb',
                'fold_logo.min' => 'Invalid fold-logo',
                'fold_logo.max' => 'Fold-logo cannot be more than 5Mb'
            ]
        );

        $siteSetting = SiteSetting::findOrFail($id);

        if ($request->hasFile('favicon')) {
            if ($siteSetting->favicon_file_name && file_exists($siteSetting->favicon_full_path)) {
                unlink($siteSetting->favicon_full_path);
            }
            $reqFile = $request->file('favicon');
            $fileName = 'favicon';
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $newFileName = $fileName . '.' . $fileExtension;
            $fileDir = SiteSetting::FAVICON_DIR;
            try {
                Image::make($reqFile)
                    ->resize(32, 32)
                    ->save($fileDir . $newFileName);
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $siteSetting->favicon_dir = $fileDir;
            $siteSetting->favicon_file_name = $newFileName;
        }

        if ($request->hasFile('logo')) {
            if ($siteSetting->logo_file_name && file_exists($siteSetting->logo_full_path)) {
                unlink($siteSetting->logo_full_path);
            }
            $reqFile = $request->file('logo');
            $fileName = 'logo';
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $newFileName = $fileName . '.' . $fileExtension;
            $fileDir = SiteSetting::LOGO_DIR;
            try {
                Image::make($reqFile)
                    ->resize(130, 65)
                    ->encode($fileExtension, 85)
                    ->save($fileDir . $newFileName);
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $siteSetting->logo_dir = $fileDir;
            $siteSetting->logo_file_name = $newFileName;
        }

        if ($request->hasFile('fold_logo')) {
            if ($siteSetting->fold_logo_file_name && file_exists($siteSetting->fold_logo_full_path)) {
                unlink($siteSetting->fold_logo_full_path);
            }
            $reqFile = $request->file('fold_logo');
            $fileName = 'fold_logo';
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $newFileName = $fileName . '.' . $fileExtension;
            $fileDir = SiteSetting::FOLD_LOGO_DIR;
            try {
                Image::make($reqFile)
                    ->resize(80, 65)
                    ->encode($fileExtension, 80)
                    ->save($fileDir . $newFileName);
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $siteSetting->fold_logo_dir = $fileDir;
            $siteSetting->fold_logo_file_name = $newFileName;
        }

        $siteSetting->email = $request->email;
        $siteSetting->phone = $request->phone;
        $siteSetting->address = $request->address;

        $siteSetting->save();
        return back()->with($this->successAlert('Successfully updated!'));
    }

    public function optimize(Request $request)
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('optimize:clear');
            Artisan::call('optimize');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with($this->errorAlert('Failed to run optimization'));
        }

        return '<h2 style="text-align:center; margin-top: 50px;">Optimized, go back and refresh</h2>';
    }

    protected function setAppNameToJSON($name)
    {
        if (file_exists('app_config/app_settings.json')) {
            $siteSettingsPath = public_path('app_configs/app_settings.json');
            $getAppName = json_decode(file_get_contents($siteSettingsPath), true);
            $getAppName['app_name'] = $name;
            file_put_contents(public_path('app_configs/app_settings.json'),  json_encode($getAppName, JSON_PRETTY_PRINT));
        }
    }
}
