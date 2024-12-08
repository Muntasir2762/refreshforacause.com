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
                    <li class="breadcrumb-item active" aria-current="page">{{$singleProduct->title}}</li>
                </ol>
                <h2 class="title">{{$singleProduct->title}}</h2>
                <div class="text">
                    <p>{{$singleProduct->sku_id}}</p>
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
                                        $ {{ $singleProduct->price - $singleProduct->price * ($singleProduct->discount_amount / 100) }}
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
                                    <span>{{$singleProduct->material}}</span>
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
                                        <span class="">{{$singleProduct->color}}</span>
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
                                        <span class="">{{$singleProduct->size}}</span>
                                    </div>
                                </div>

                                <hr />

                                <div class="info-box">
                                    <span>
                                        Quantity
                                    </span>
                                    <span>
                                        <form action="" method="">
                                            @csrf
                                            <span class="row">
                                                <span class="col-6">
                                                    <input type="number" name="" value="1" min="1" class="form-control">
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
                                            {{$singleProduct->description}}
                                        </small>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box info-box-addto added">
                                    <span>
                                        <a href="#"><i class="added"><i class="icon icon-cart"></i> Add to Cart</i></a>
                                    </span>
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
                            @for ($i = 0; $i<=0; $i++)
                                <a href="/{{$singleProduct->thumb_large}}">
                                    <img src="{{ asset($singleProduct->thumb_large) }}" alt="{{$singleProduct->title}}" />
                                </a>
                            @endfor
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
