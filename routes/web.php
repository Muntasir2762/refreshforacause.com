<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CompanyAdmin\OrganizationController;
use App\Http\Controllers\CompanyAdmin\ProfileController as BackOfficeProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\OrgMemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyAdmin\BannerImageController;
use App\Http\Controllers\CompanyAdmin\ProductController;
use App\Http\Controllers\CompanyAdmin\SurfaceUserController;
use App\Http\Controllers\CompanyAdmin\TrackingScriptController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipStationController;

require __DIR__ . '/auth.php';


//Site Optimization..
Route::get('/clear' , [SiteSettingController::class, 'optimize']);

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

        Route::prefix('tracking-script')
            ->name('tracking-script.')
            ->group(function () {
                Route::get('/', [TrackingScriptController::class, 'index'])
                    ->name('index');
                Route::post('/store', [TrackingScriptController::class, 'store'])
                    ->name('store');
                Route::delete('/delete/{id}', [TrackingScriptController::class, 'destroy'])
                    ->name('delete');
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
                Route::get('/view/{id}', [OrganizationController::class, 'view'])
                    ->name('view');
                // Route::delete('/remove/{id}', [OrganizationController::class, 'destroy'])
                //     ->name('delete');

                //Org Member..
                Route::get('/member', [OrganizationController::class, 'orgMember'])
                    ->name('member');
                Route::get('/member/add', [OrganizationController::class, 'createMember'])
                    ->name('member.add');
                Route::post('/member/store', [OrganizationController::class, 'storeMember'])
                    ->name('member.store');
                Route::get('/member/edit/{id}', [OrganizationController::class, 'editMember'])
                    ->name('member.edit');
                Route::post('/member/update/{id}', [OrganizationController::class, 'updateMember'])
                    ->name('member.update');
                Route::get('/member/view/{id}', [OrganizationController::class, 'viewMember'])
                    ->name('member.view');
                // Route::delete('/member/remove/{id}', [OrganizationController::class, 'destroyMember'])
                //     ->name('delete');
            });

        Route::prefix('manage-users')
            ->name('manage.users.')
            ->group(function () {
                Route::get('/', [SurfaceUserController::class, 'index'])
                    ->name('index');
                Route::get('/edit/{id}', [SurfaceUserController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [SurfaceUserController::class, 'update'])
                    ->name('update');
            });

        Route::prefix('manage-campaigns')
            ->name('manage.campaigns.')
            ->group(function () {
                Route::get('/', [CampaignController::class, 'index'])
                    ->name('index');
                Route::post('/store', [CampaignController::class, 'store'])
                    ->name('store');
                Route::get('/edit/{id}', [CampaignController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [CampaignController::class, 'update'])
                    ->name('update');
            });

        Route::prefix('manage-categories')
            ->name('manage.categories.')
            ->group(function () {
                Route::get('/', [CategoryController::class, 'index'])
                    ->name('index');
                Route::post('/store', [CategoryController::class, 'store'])
                    ->name('store');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [CategoryController::class, 'update'])
                    ->name('update');
            });

        Route::prefix('manage-products')
            ->name('manage.products.')
            ->group(function () {
                Route::get('/', [ProductController::class, 'index'])
                    ->name('index');
                Route::get('/add', [ProductController::class, 'create'])
                    ->name('add');
                Route::post('/store', [ProductController::class, 'store'])
                    ->name('store');
                Route::get('/edit/{id}', [ProductController::class, 'edit'])
                    ->name('edit');
                Route::post('/update/{id}', [ProductController::class, 'update'])
                    ->name('update');
                Route::get('/details/{id}', [ProductController::class, 'show'])
                    ->name('details');
            });

        Route::prefix('manage-banners')
            ->name('manage.banners.')
            ->group(function () {
                Route::get('/', [BannerImageController::class, 'index'])
                    ->name('index');
                Route::post('/store', [BannerImageController::class, 'store'])
                    ->name('store');
                Route::delete('/delete/{id}', [BannerImageController::class, 'destroy'])
                    ->name('delete');
            });

        Route::prefix('manage-orders')
            ->name('manage.')
            ->group(function () {
                Route::get('/{order_status}', [OrderController::class, 'getOrders'])->name('orders');
                Route::post('/update-order-status', [OrderController::class, 'updateStatus'])->name('orders.status');
                Route::get('/org-order/{org_id}/{order_status}', [OrderController::class, 'getOrgOrders'])->name('orders.org');

                //Org Member Orders...
                Route::get('/org-member-order/{org_member_ref}/{order_status}', [OrderController::class, 'getOrgMemberOrders'])->name('orders.org.member');
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

//Shipstation Routes
Route::middleware(['role:orgadmin'])
->group(function () {
    

});
    Route::post('/shipstation/labels', [ShipStationController::class, 'createLabel']);
    Route::get('/shipstation/carriers', [ShipStationController::class, 'getCarriers']);



//FE ECOM route group

Route::prefix('/')
    ->name('frontend.')
    ->group(function () {

        Route::get('', [HomeController::class, 'index'])->name('index');

        Route::prefix('user')
            ->name('users.')
            ->group(function () {
                Route::get('/sign-in', [AuthenticatedSessionController::class, 'surfaceUserCreate'])->name('login');

                Route::get('/sign-up', [RegisteredUserController::class, 'surfaceUserRegister'])->name('register');

                Route::post('/sign-up/store', [RegisteredUserController::class, 'surfaceUserRegistrationStore'])->name('register.store');
            });

        Route::prefix('store/products')
            ->name('products.')
            ->group(function () {
                //This route should have a slug of the product + id
                //Example URI store/products/details/my-bottle/100
                Route::get('/details/{id}/{slug}', [FrontendProductController::class, 'show'])->name('details');
                //This route should have a slug of the product category e.g. bottle
                //Example URI store/products/bottle
                Route::get('/{cat_slug}/{cat_id}', [FrontendProductController::class, 'index'])->name('all');
                Route::get('/campaign/{camp_slug}/{camp_id}', [HomeController::class, 'indexCampaign'])->name('campaign');
            });

        Route::prefix('cart')
            ->name('cart.')
            ->group(function () {
                Route::get('/product/{id}/{slug}/{page}', [FrontendProductController::class, 'addToCart'])->name('add');
                Route::post('/product/details/{id}', [FrontendProductController::class, 'addToCartDetailsPage'])->name('add.details');
                Route::get('/delete/{id}', [FrontendProductController::class, 'deleteCart'])->name('delete');
                Route::get('/product/checkout', [FrontendProductController::class, 'checkOut'])->name('checkout.products');
                Route::post('/product/order/store', [FrontendProductController::class, 'storeOrder'])->name('checkout.order.store');
                Route::get('/order/checkout/confirmed/{order_id}', [FrontendProductController::class, 'thankYou'])->name('checkout.confirmed');
            });   
            
        Route::name('inner.')
            ->group(function () {
                Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
            });  
    });
