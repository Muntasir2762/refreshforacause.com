<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Traits\AlertTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('frontend.pages.fe-products');
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
    public function show(Request $request, string $id, string $slug)
    {
        $singleProduct = Product::where('id', $id)->where('slug', $slug)->first();
        return view('frontend.pages.fe-product-details', compact('singleProduct'));
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

    public function addToCart($id, $slug, $page)
    {
        // Find the product or return an error response
        $product = Product::where('id', $id)->where('slug', $slug)->first();

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.',
            ], 404);
        }

        // Check if the product is already in the cart
        $cartExists = Cart::where('product_id', $product->id)
            ->where(function ($query) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('ip_address', request()->ip());
                }
            })
            ->exists();

        if ($cartExists && $page == "single") {
            return response()->json([
                'status' => 'info',
                'message' => 'Product is already in your cart.',
            ]);
        }

        elseif($cartExists && $page == "bulk"){
            return back()->with($this->errorAlert('Already Added to Cart!'));
        }

        // Add product to cart
        Cart::create([
            'product_id' => $product->id,
            'ip_address' => request()->ip(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'price' => $product->price - $product->price * (($product->discount_amount ?? 0) / 100),
        ]);

        if($page == "single"){
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!',
                'productName' => $product->name,
                'productImage' => asset($product->image),
            ]);
        }
        else{
            return back()->with($this->successAlert('Product Added to cart!'));
        }
    }

    public function addToCartDetailsPage (Request $request, string $id)
    {
         // Find the product or return an error response
         $product = Product::where('id', $id)->first();

         if (!$product) {
            return back()->with($this->errorAlert('Product not found!'));
         }
 
         // Check if the product is already in the cart
         $cartExists = Cart::where('product_id', $product->id)
             ->where(function ($query) {
                 if (Auth::check()) {
                     $query->where('user_id', Auth::id());
                 } else {
                     $query->where('ip_address', request()->ip());
                 }
             })
             ->first();
 
         if ($cartExists) {
            $cartExists->qty = $request->qty;
            $cartExists->price = $product->price - $product->price * (($product->discount_amount ?? 0) / 100);
            $cartExists->size = $request->size;
            $cartExists->color = $request->color;
            $cartExists->save();
            return redirect()->route('frontend.cart.checkout.products')->with($this->successAlert('Product Added to cart!'));
         }
 
         // Add product to cart
         Cart::create([
             'product_id' => $product->id,
             'ip_address' => request()->ip(),
             'user_id' => Auth::check() ? Auth::id() : null,
             'price' => $product->price - $product->price * (($product->discount_amount ?? 0) / 100),
             'qty' => $request->qty,
             'color' => $request->color,
             'color' => $request->size,
         ]);

         return redirect()->route('frontend.cart.checkout.products')->with($this->successAlert('Product Added to cart!'));

    }

    public function checkOut ()
    {
        return view('frontend.pages.fe-product-checkout');
    }

    public function storeOrder (Request $request)
    {
        if (session()->has('affiliate_id')) {
            $affiliate_id = session('affiliate_id');
            dd($affiliate_id);

            //Place order and forget affiliate_id..
            // session()->forget('affiliate_id');
        }

        else{
            dd("No affiliate_id is found");
        }
    }

    public function thankYou ($order_id)
    {
        return view ('frontend.pages.fe-thankyou');
    }

}
