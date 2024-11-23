<?php

use App\Http\Controllers\CompanyAdmin\OrganizationController;
use App\Http\Controllers\CompanyAdmin\ProfileController as BackOfficeProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\OrgMemberController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

//Profile Route for BE(Backend or Back Office) users
Route::prefix('profile')
    ->name('be.profile.')
    ->middleware(['role:companyadmin,orgadmin,orgmember'])
    ->group(function () {
        Route::get('/', [BackOfficeProfileController::class, 'index'])
            ->name('index');
        Route::post('/{id}', [BackOfficeProfileController::class, 'update'])
            ->name('update');
        Route::post('/password/{id}', [BackOfficeProfileController::class, 'updatePassword'])
            ->name('password');
    });


//Company Admin Middlreware group routes
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

//Organization Admin Middlreware group routes
Route::middleware(['role:orgadmin'])
    ->group(function () {
        Route::prefix('manage-member')
            ->name('manage.member.')
            ->group(function () {
                Route::get('/', [OrgMemberController::class, 'index'])
                    ->name('index');
                Route::get('/add', [OrgMemberController::class, 'create'])
                    ->name('add');
                Route::post('/store', [OrgMemberController::class, 'store'])
                    ->name('store');
                Route::get('/edit/{id}', [OrgMemberController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [OrgMemberController::class, 'update'])
                    ->name('update');
            });
    });
