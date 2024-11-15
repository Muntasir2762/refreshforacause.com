<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Exception;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;

class SiteSettingController extends Controller
{

    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
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
            $appSettingsPath = public_path('app_configs/app_settings.json');
            $getAppName = json_decode(file_get_contents($appSettingsPath), true);
            $getAppName['app_name'] = $name;
            file_put_contents(public_path('app_configs/app_settings.json'),  json_encode($getAppName, JSON_PRETTY_PRINT));
        }
    }
}
