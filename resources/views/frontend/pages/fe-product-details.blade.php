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
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
                <h2 class="title">Mellany Sofa</h2>
                <div class="text">
                    <p>Nam egestas tincidunt turpis</p>
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
                                        $ 1999,00
                                        <small>$ 2999,00</small>
                                    </span>
                                </div>

                                <hr />

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Maifacturer</strong></span>
                                    <span>Brand name</span>
                                </div>

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Materials</strong></span>
                                    <span>Wood, Leather, Acrylic</span>
                                </div>

                                <hr />


                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Available Colors</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div>
                                </div>

                                <hr />

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Choose size</strong></span>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">
                                            <span class="product-size" data-text="">S</span>
                                        </span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
                                    </div>
                                </div>

                                <hr />

                                <div class="info-box">
                                    <span>
                                        Quantity
                                    </span>
                                    <span>
                                        <span class="row">
                                            <span class="col-6">
                                                <input type="number" value="1" class="form-control">
                                            </span>
                                            <span class="col-6">
                                                <a href="#" class="btn btn-danger">Buy now</a>
                                            </span>
                                        </span>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box">
                                    <span>
                                        <small>*** We progress your order for shipping as soon as possible. Please note that
                                            after your order has been received, we can not change the delivery address.
                                            Control your address details in any case before placing your order!</small>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box info-box-addto added">
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
                                </div>

                            </div> <!--/clearfix-->
                        </div> <!--/product-info-wrapper-->
                    </div> <!--/col-lg-4-->
                    <!--product item gallery-->

                    <div class="col-lg-8 product-flex-gallery">

                        <!--product gallery-->

                        <div class="owl-product-gallery owl-carousel owl-theme open-popup-gallery">
                            <a href="assets/images/product-10.jpg"><img
                                    src="{{ asset('frontend/assets/images/product-10.jpg') }}" alt="" /></a>
                            <a href="assets/images/product-9.jpg"><img
                                    src="{{ asset('frontend/assets/images/product-9.jpg') }}" alt="" /></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
