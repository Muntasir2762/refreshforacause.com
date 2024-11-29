<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\ProductStatus;
use App\Models\ProductTrendType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.product-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productStatuses = ProductStatus::orderBy('name', 'asc')->get();
        $productTrendTypes = ProductTrendType::orderBy('trend', 'asc')->get();
        $productSizes = ProductSize::orderBy('size', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.product.product-add', compact([
            'productStatuses',
            'productTrendTypes',
            'categories',
            'productSizes'
        ]));
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
        return view('admin.product.product-details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.product.product-edit');
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
}
