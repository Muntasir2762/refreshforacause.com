<?php

namespace App\Providers;

use App\Models\Cart;
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
        });
    }
}
