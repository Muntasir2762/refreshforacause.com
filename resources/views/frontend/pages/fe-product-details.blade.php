@extends('frontend.layout.ecom-layout')

@section('pageTitle')
    Product Details |
@endsection

@section('mainContent')
    <section class="product pt-0">

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product-Details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $singleProduct->title }}</li>
                </ol>
                <h2 class="title">{{ $singleProduct->title }}</h2>
                <div class="text">
                    <p>{{ $singleProduct->sku_id }}</p>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="container">
                <div class="row product-flex">

                    <div class="col-lg-4 product-flex-info">
                        <div class="clearfix">

                            <div class="clearfix">

                                <!--price wrapper-->

                                <div class="price">
                                    <span class="h3">
                                        $
                                        {{ $singleProduct->price - $singleProduct->price * ($singleProduct->discount_amount / 100) }}
                                        <small>$ {{ $singleProduct->price }}</small>
                                    </span>
                                </div>

                                <hr />

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Maifacturer</strong></span>
                                    <span>Refreshforacause</span>
                                </div>

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Materials</strong></span>
                                    <span>{{ $singleProduct->material }}</span>
                                </div>

                                <hr />


                                <!--info-box-->

                                <div class="info-box">
                                    {{-- <span><strong>Available Colors</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div> --}}
                                    <span><strong>Color</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="">{{ $singleProduct->color }}</span>
                                    </div>
                                </div>

                                <hr />

                                <!--info-box-->

                                <div class="info-box">
                                    {{-- <span><strong>Choose size</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">
                                            <span class="product-size" data-text="">S</span>
                                        </span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
                                    </div> --}}
                                    <span><strong>Size</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="">{{ $singleProduct->size }}</span>
                                    </div>
                                </div>

                                <hr />

                                <div class="info-box">
                                    <span>
                                        Quantity
                                    </span>
                                    <span>
                                        <form action="{{route('frontend.cart.add.details', [$singleProduct->id, $singleProduct->slug])}}" method="POST">
                                            @csrf
                                            <span class="row">
                                                <span class="col-6">
                                                    <input type="number" name="qty" value="1" min="1" class="form-control">
                                                    <input type="hidden" name="color" id="color" value="{{$singleProduct->color}}" class="form-control">
                                                    <input type="hidden" name="size" id="size" value="{{$singleProduct->size}}" class="form-control">
                                                </span>
                                                <span class="col-6">
                                                    <button type="submit" class="btn btn-danger">Buy now</button>
                                                </span>
                                            </span>
                                        </form>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box">
                                    <span>
                                        <small>
                                            {{ $singleProduct->description }}
                                        </small>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box info-box-addto added">
                                    <span id="add-to-cart-container">
                                        <a href="javascript:void(0);" id="add-to-cart-btn"
                                            data-url="{{ route('frontend.cart.add', [$singleProduct->id, $singleProduct->slug, 'single']) }}">
                                            <i class="added"><i class="icon icon-cart"></i> Add to Cart</i>
                                        </a>
                                    </span>
                                    <div id="cart-preloader" class="page-loader" style="display: none;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="info-box info-box-addto added">
                                    <span>
                                        <i class="add"><i class="fa fa-heart-o"></i> Add to favorites</i>
                                        <i class="added"><i class="fa fa-heart"></i> Remove from favorites</i>
                                    </span>
                                </div>

                                <div class="info-box info-box-addto">
                                    <span>
                                        <i class="add"><i class="fa fa-eye-slash"></i> Add to Watch list</i>
                                        <i class="added"><i class="fa fa-eye"></i> Remove from Watch list</i>
                                    </span>
                                </div>

                                <div class="info-box info-box-addto">
                                    <span>
                                        <i class="add"><i class="fa fa-star-o"></i> Add to Collection</i>
                                        <i class="added"><i class="fa fa-star"></i> Remove from Collection</i>
                                    </span>
                                </div> --}}

                            </div> <!--/clearfix-->
                        </div> <!--/product-info-wrapper-->
                    </div> <!--/col-lg-4-->
                    <!--product item gallery-->

                    <div class="col-lg-8 product-flex-gallery">

                        <!--product gallery-->

                        <div class="owl-product-gallery owl-carousel owl-theme open-popup-gallery">
                            @for ($i = 0; $i <= 0; $i++)
                                <a href="/{{ $singleProduct->thumb_large }}">
                                    <img src="{{ asset($singleProduct->thumb_large) }}"
                                        alt="{{ $singleProduct->title }}" />
                                </a>
                            @endfor
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cartModalLabel">Product Added to Cart</h5>
                                    <!-- Close button corrected for Bootstrap 4 -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center" style="display: none">
                                    <p><strong id="productName"></strong> has been added to your cart!</p>
                                    <img id="productImage" src="" alt="Product Image"
                                        class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-primary">Checkout</a>
                                    <a href="{{ url('/') }}" class="btn btn-secondary" data-dismiss="modal">Continue
                                        Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->





                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script>
        document.getElementById('add-to-cart-btn').addEventListener('click', function() {
            const button = this;
            const url = button.getAttribute('data-url');
            const preloader = document.getElementById('cart-preloader');
            const container = document.getElementById('add-to-cart-container');

            // Show preloader
            preloader.style.display = 'flex';
            container.style.display = 'none';

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Hide preloader
                    preloader.style.display = 'none';
                    container.style.display = 'block';

                    // Update the modal content with product name and image
                    document.getElementById('productName').textContent = data.productName;
                    document.getElementById('productImage').src = data.productImage;

                    // Show the modal using Bootstrap 4 jQuery method
                    $('#cartModal').modal('show');
                })
                .catch(error => {
                    preloader.style.display = 'none';
                    container.style.display = 'block';
                    alert('Failed to add product to cart. Please try again.');
                    console.error(error);
                });
        });
    </script>
@endpush
