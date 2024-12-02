@extends('frontend.layout.ecom-layout')

@section('mainContent')
    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <h2 class="d-none">Slider element</h2>

        <div class="container-fluid">

            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">

                <!--Slide item-->

                <div class="item d-flex align-items-center" style="background-image:url(assets/images/slide-1.jpg);">
                    <div class="container">
                        <div class="caption">
                            <div class="animated" data-start="fadeInUp">
                                <div class="promo pt-3">
                                    <div class="title title-sm p-0">Sofa Grace</div>
                                </div>
                            </div>
                            <div class="animated" data-start="fadeInUp">
                                Score new arrivals from latest items
                                <br />
                                Multipurpose eCommerce template ready
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!--/owl-slider-->
        </div>
    </section>

    <!-- ========================  Popular products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Popular products</h2>
                <div class="text">
                    <p>
                        Find your perfect match <a href="products-grid.html" class="btn btn-main">View all</a>
                    </p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-10.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Anna</a>
                                </h2>
                                <sub>$ 159,-</sub>
                                <sup>$ 139,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <span class="badge badge-warning">-20%</span>
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-9.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Lucy</a>
                                </h2>
                                <sub>$ 319,-</sub>
                                <sup>$ 219,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <span class="badge badge-info">New arrival</span>
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-8.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Ella</a>
                                </h2>
                                <sub>$ 899,-</sub>
                                <sup>$ 750,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite added">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-7.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Grace</a>
                                </h2>
                                <sub>$ 699,-</sub>
                                <sup>$ 499,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-6.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Nora</a>
                                </h2>
                                <sub>$ 299,-</sub>
                                <sup>$ 199,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Product item-->

                <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites"
                                    data-title-added="Added to favorites list">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                            <span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                    <i class="icon icon-eye"></i>
                                </a>
                            </span>
                        </div>
                        <div class="btn btn-add">
                            <i class="icon icon-cart"></i>
                        </div>
                        <div class="figure-grid">
                            <div class="image">
                                <a href="product.html">
                                    <img src="assets/images/product-5.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Sophie</a>
                                </h2>
                                <sub>$ 699,-</sub>
                                <sup>$ 499,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

            </div> <!--/row-->

        </div>

    </section>
@endsection
