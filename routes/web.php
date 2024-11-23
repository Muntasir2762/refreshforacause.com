<?php

use App\Http\Controllers\CompanyAdmin\OrganizationController;
use App\Http\Controllers\CompanyAdmin\ProfileController as CompanyAdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['role:companyadmin'])
    ->group(function () {
        Route::prefix('site-settings')
            ->name('site-settings.')
            ->group(function () {
                Route::get('/', [SiteSettingController::class, 'index'])
                    ->name('index');
                Route::post('/{id}', [SiteSettingController::class, 'update'])
                    ->name('update');
            });

        Route::prefix('social-media')
            ->name('social-media.')
            ->group(function () {
                Route::get('/', [SocialMediaController::class, 'index'])
                    ->name('index');
                Route::post('/bulk-update', [SocialMediaController::class, 'update'])
                    ->name('bulk.update');
            });

        Route::prefix('manage-org')
            ->name('manage.org.')
            ->group(function () {
                Route::get('/', [OrganizationController::class, 'index'])
                    ->name('index');
                Route::get('/add', [OrganizationController::class, 'create'])
                    ->name('add');
                Route::post('/store', [OrganizationController::class, 'store'])
                    ->name('store');
                Route::get('/edit/{id}', [OrganizationController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [OrganizationController::class, 'update'])
                    ->name('update');
                // Route::delete('remove/{id}', [OrganizationController::class, 'destroy'])
                //     ->name('delete');
            });
    });

//BE = Backend or Back Office for admin users
Route::middleware(['role:companyadmin'])
    ->prefix('profile')
    ->name('be.profile.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [CompanyAdminProfileController::class, 'index'])
            ->name('index');
        Route::post('/{id}', [CompanyAdminProfileController::class, 'update'])
            ->name('update');
        Route::post('/password/{id}', [CompanyAdminProfileController::class, 'updatePassword'])
            ->name('password');
    });
