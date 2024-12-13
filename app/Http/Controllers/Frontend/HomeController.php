<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerImages = BannerImage::get();
        $hotProducts = Product::orderBy('id', 'desc')->where('trend_type', 'hot')->where('status', 'in stock')->get();
        $newProducts = Product::orderBy('id', 'desc')->where('trend_type', 'new')->where('status', 'in stock')->get();
        $saleProducts = Product::orderBy('id', 'desc')->where('trend_type', 'sale')->where('status', 'in stock')->get();
        $featuredProducts = Product::orderBy('id', 'desc')->where('is_featured', 1)->where('status', 'in stock')->get();
        // return view('frontend.index', compact('bannerImages', 'hotProducts', 'newProducts', 'saleProducts', 'featuredProducts'));
        return view('frontend.index-v2', compact('bannerImages', 'hotProducts', 'newProducts', 'saleProducts', 'featuredProducts'));
    }

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

    //Inner Pages...

    public function aboutUs ()
    {
        return view ('frontend.inner-pages.about-us');
    }
}
