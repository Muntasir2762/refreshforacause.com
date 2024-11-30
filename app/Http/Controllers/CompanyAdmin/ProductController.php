<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductStatus;
use App\Models\ProductTrendType;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Exception;

class ProductController extends Controller
{
    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
            ->with('category')
            ->paginate(15);
        return view('admin.product.product-index', compact(['products']));
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

        $request->validate(
            [
                'title' => 'required|min:3|max:254',
                'sku_id' => 'required|max:254|unique:products,sku_id',
                'category_id' => 'required',
                'price' => 'required',
                'discount_amount' => 'nullable',
                'vat_amount' => 'nullable',
                'quantity' => 'required',
                'size' => 'nullable',
                'material' => 'nullable',
                'color' => 'nullable',
                'capacity' => 'nullable',
                'status' => 'required',
                'trend_type' => 'nullable',
                'is_featured' => 'nullable',
                'description' => 'nullable',
                'thumbnail' => 'required|image|mimes:png,jpg,jpeg|min:1|max:5121'
            ],
            [
                'thumbnail.max' => 'Thumbnail cannot be more than 5Mb'
            ]
        );

        $product = new Product();

        $product->fill([
            'title' => $request->title,
            'sku_id' => $request->sku_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'vat_amount' => $request->vat_amount,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'material' => $request->material,
            'color' => $request->color,
            'capacity' => $request->capacity,
            'status' => $request->status,
            'trend_type' => $request->trend_type,
            'description' => $request->description,
        ]);


        $product->is_featured = $request->is_featured ? true : false;
        $product->slug = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {

            $reqFile = $request->file('thumbnail');
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $fileName = pathinfo($reqFile->getClientOriginalName(), PATHINFO_FILENAME);
            $larageThumbDir = Product::THUMB_LARGE_IMAGE_DIR;
            $smallThumbDir = Product::THUMB_SMALL_IMAGE_DIR;
            $thumbnailName = $this->generateFileName($fileName, $fileExtension);

            try {
                Image::make($reqFile)
                    ->resize(760, 600)
                    ->save($larageThumbDir .  $thumbnailName);

                Image::make($reqFile)
                    ->resize(70, 70)
                    ->save($smallThumbDir .  $thumbnailName);
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $product->thumb_large = $larageThumbDir .  $thumbnailName;
            $product->thumb_small = $smallThumbDir .  $thumbnailName;
        }

        $product->save();

        return back()
            ->with($this->successAlert('Successfully Created!'));
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
        $productStatuses = ProductStatus::orderBy('name', 'asc')->get();
        $productTrendTypes = ProductTrendType::orderBy('trend', 'asc')->get();
        $productSizes = ProductSize::orderBy('size', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        $product = Product::findOrFail($id);

        return view('admin.product.product-edit', compact([
            'productStatuses',
            'productTrendTypes',
            'categories',
            'productSizes',
            'product'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $productId = $request->id;
        $request->validate(
            [
                'title' => 'required|min:3|max:254',
                'sku_id' => 'required|max:254|unique:products,sku_id,' . $productId,
                'category_id' => 'required',
                'price' => 'required',
                'discount_amount' => 'nullable',
                'vat_amount' => 'nullable',
                'quantity' => 'required',
                'size' => 'nullable',
                'material' => 'nullable',
                'color' => 'nullable',
                'capacity' => 'nullable',
                'status' => 'required',
                'trend_type' => 'nullable',
                'is_featured' => 'nullable',
                'description' => 'nullable',
                'thumbnail' => 'image|mimes:png,jpg,jpeg|min:1|max:5121'
            ],
            [
                'thumbnail.max' => 'Thumbnail cannot be more than 5Mb'
            ]
        );

        $product = Product::findOrFail($productId);

        $product->fill([
            'title' => $request->title,
            'sku_id' => $request->sku_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'vat_amount' => $request->vat_amount,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'material' => $request->material,
            'color' => $request->color,
            'capacity' => $request->capacity,
            'status' => $request->status,
            'trend_type' => $request->trend_type,
            'description' => $request->description,
        ]);

        $product->is_featured = $request->is_featured ? true : false;
        $product->slug = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            $reqFile = $request->file('thumbnail');
            $fileExtension = strtolower($reqFile->getClientOriginalExtension());
            $fileName = pathinfo($reqFile->getClientOriginalName(), PATHINFO_FILENAME);
            $larageThumbDir = Product::THUMB_LARGE_IMAGE_DIR;
            $smallThumbDir = Product::THUMB_SMALL_IMAGE_DIR;
            $thumbnailName = $this->generateFileName($fileName, $fileExtension);

            try {
                Image::make($reqFile)
                    ->resize(760, 600)
                    ->save($larageThumbDir .  $thumbnailName);

                Image::make($reqFile)
                    ->resize(70, 70)
                    ->save($smallThumbDir .  $thumbnailName);

                if ($product->thumb_large && file_exists($product->thumb_large)) {
                    unlink($product->thumb_large);
                }

                if ($product->thumb_small && file_exists($product->thumb_small)) {
                    unlink($product->thumb_small);
                }
            } catch (Exception $e) {
                return back()->with($this->errorAlert('Failed to upload!'));
            }

            $product->thumb_large = $larageThumbDir .  $thumbnailName;
            $product->thumb_small = $smallThumbDir .  $thumbnailName;
        }

        $product->save();

        return back()
            ->with($this->successAlert('Successfully Updated!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
