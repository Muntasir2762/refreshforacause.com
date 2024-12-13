<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Traits\AlertTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $cat_slug, string $cat_id)
    {
        $catProducts = Product::where('category_id', $cat_id)->with('category')->paginate(30);
        return view('frontend.pages.fe-products', compact('catProducts'));
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
        } elseif ($cartExists && $page == "bulk") {
            return back()->with($this->errorAlert('Already Added to Cart!'));
        }

        // Add product to cart
        Cart::create([
            'product_id' => $product->id,
            'ip_address' => request()->ip(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'price' => $product->price - $product->price * (($product->discount_amount ?? 0) / 100),
        ]);

        if ($page == "single") {
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!',
                'productName' => $product->name,
                'productImage' => asset($product->image),
            ]);
        } else {
            return back()->with($this->successAlert('Product Added to cart!'));
        }
    }

    public function addToCartDetailsPage(Request $request, string $id)
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

    public function deleteCart ($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back()->with($this->errorAlert('Item is removed from cart!'));
    }

    public function checkOut()
    {
        return view('frontend.pages.fe-product-checkout');
    }

    public function storeOrder(Request $request)
    {

        $cartProducts = Cart::when(auth()->check(), function ($query) {
            $query->where('user_id', auth()->id());
        }, function ($query) {
            $query->where('ip_address', request()->ip());
        })
            ->with('product')
            ->get();

            if($cartProducts->isNotEmpty()){
                try {
                    DB::beginTransaction();
        
                    // Create Order
                    $order = new Order();
                    if (session()->has('affiliate_id') && session('affiliate_id') != "No affiliate_id is found") {
                        $order->affiliate_id = session('affiliate_id');
                    }
                    $order->buyer_ip = $request->ip();
                    $order->buyer_id = Auth::user()->id ?? null;
                    $order->buyer_name = $request->buyer_name;
                    $order->buyer_phone = $request->buyer_phone;
                    $order->buyer_email = $request->buyer_email;
                    $order->buyer_address = $request->buyer_address;
                    $order->buyer_city = $request->buyer_city;
                    $order->buyer_state = $request->buyer_state;
                    $order->buyer_zipcode = $request->buyer_zipcode;
                    $getInvoiceNumber = $order->invoiceNumber();
                    $order->invoice_no = $getInvoiceNumber;
                    $order->total_vat = $request->total_vat;
                    $order->sub_total = $request->sub_total;
                    $order->grand_total = $request->grand_total;
                    $order->total_items = $cartProducts->sum('qty');
                    $order->payment_method = $request->payment_method;
        
                    $order->save();
                    //Place order and forget affiliate_id..
                    session()->forget('affiliate_id');
        
                    // Create Order Details
                    foreach ($cartProducts as $productData) {
                        $orderDetails = new OrderDetails();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $productData->product_id;
                        $orderDetails->qty = $productData->qty;
                        $orderDetails->price = $productData->price;
                        $orderDetails->size = $productData->size;
                        $orderDetails->color = $productData->color;
                        $orderDetails->save();
                    }
        
                    //Delete Cart Products...
                    foreach ($cartProducts as $product) {
                        $product->delete();
                    }
        
                    DB::commit();
        
                    return redirect()->route('frontend.cart.checkout.confirmed', [$getInvoiceNumber]);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with($this->errorAlert($e->getMessage()));
                }
            }

            else{
                return back()->with($this->errorAlert('Please add product in your cart!'));
            }
    }

    public function thankYou($order_id)
    {
        $order = Order::where('invoice_no', $order_id)->with('orderDetails')->first();
        return view('frontend.pages.fe-thankyou', compact('order'));
    }
}
