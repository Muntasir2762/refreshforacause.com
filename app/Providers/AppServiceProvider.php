<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\Cart;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $cartItems = Cart::when(auth()->check(), function ($query) {
                    $query->where('user_id', auth()->id());
                }, function ($query) {
                    $query->where('ip_address', request()->ip());
                })
                ->with('product')
                ->get();
    
            $view->with('cartItems', $cartItems);
            $view->with('siteSettings', SiteSetting::first());
            $view->with('globalCampaigns', Campaign::where('status', 'live')->get());
            $view->with('categories', Category::where('status', 'live')->get());
            $view->with('socialMedia', SocialMedia::get());
        });
    }
}
