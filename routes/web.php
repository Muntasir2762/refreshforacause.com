<?php

use App\Http\Controllers\CompanyAdmin\ProfileController as CompanyAdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['role:companyadmin'])
    ->prefix('site-settings')
    ->name('site-settings.')
    ->group(function () {
        Route::get('/', [SiteSettingController::class, 'index'])
            ->name('index');
        Route::post('/{id}', [SiteSettingController::class, 'update'])
            ->name('update');
    });

//BE = Backend or Back Office for admin users
Route::middleware(['role:companyadmin'])
    ->name('be.profile.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [CompanyAdminProfileController::class, 'index'])
            ->name('index');
        Route::post('/{id}', [CompanyAdminProfileController::class, 'update'])
            ->name('update');    
    });
