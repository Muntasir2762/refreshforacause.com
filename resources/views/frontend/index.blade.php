@extends('frontend.layout.ecom-layout')

@section('mainContent')
    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <h2 class="d-none">Slider element</h2>

        <div class="container-fluid">

            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">

                <!--Slide item-->

                @foreach ($bannerImages as $bannerImage)
                    <div class="item d-flex align-items-center"
                        style="background-image:url({{ asset($bannerImage->image) }});">
                        <div class="container">
                            <div class="caption">
                                <div class="animated" data-start="fadeInUp">
                                    <div class="promo pt-3">
                                        <div class="title title-sm p-0">Welcome to Refresh for a Cause!</div>
                                    </div>
                                </div>
                                {{-- <div class="animated" data-start="fadeInUp">
                                    We're more than just fundraising - we're parents who saw a need for a better,<br>
                                    more practical way to help organizations raise money.<br>
                                    Tired of the usual fundraisers,<br>
                                    we wanted something that's not only easy but also offers lasting value.<br>
                                    That's why we created Refresh for a Cause, a simple, effective way<br>
                                    to raise funds through water bottle and tumbler sales that everyone can use and
                                    appreciate.
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div> <!--/owl-slider-->
        </div>
    </section>

    <!-- ========================  Featured products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Featured Products</h2>
                {{-- <div class="text">
                    <p>
                        Find your perfect match <a href="products-grid.html" class="btn btn-main">View all</a>
                    </p>
                </div> --}}
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->

                @foreach ($featuredProducts as $product)
                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                {{-- <span class="add-favorite">
                                    <a href="javascript:void(0);" data-title="Add to favorites"
                                        data-title-added="Added to favorites list">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                </span> --}}
                                {{-- <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span> --}}
                            </div>
                            <div class="btn btn-add">
                                <a href="{{ route('frontend.cart.add', [$product->id, $product->slug, 'bulk']) }}"
                                    style="color: white"><i class="icon icon-cart"></i></a>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a
                                        href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                        <img src="{{ asset($product->thumb_small) }}" alt="{{ $product->title }}" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a
                                            href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a>
                                    </h2>
                                    <sub>$ {{ $product->price }}</sub>
                                    <sup>$ {{ $product->price - $product->price * ($product->discount_amount / 100) }}</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div> <!--/row-->

        </div>

    </section>

    <!-- ========================  Hot products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Hot Products</h2>
                {{-- <div class="text">
                        <p>
                            Find your perfect match <a href="products-grid.html" class="btn btn-main">View all</a>
                        </p>
                    </div> --}}
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->

                @foreach ($hotProducts as $product)
                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                {{-- <span class="add-favorite">
                                        <a href="javascript:void(0);" data-title="Add to favorites"
                                            data-title-added="Added to favorites list">
                                            <i class="icon icon-heart"></i>
                                        </a>
                                    </span> --}}
                                {{-- <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span> --}}
                            </div>
                            <div class="btn btn-add">
                                <a href="{{ route('frontend.cart.add', [$product->id, $product->slug, 'bulk']) }}"
                                    style="color: white"><i class="icon icon-cart"></i></a>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a
                                        href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                        <img src="{{ asset($product->thumb_small) }}" alt="{{ $product->title }}" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a
                                            href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a>
                                    </h2>
                                    <sub>$ {{ $product->price }}</sub>
                                    <sup>$
                                        {{ $product->price - $product->price * ($product->discount_amount / 100) }}</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div> <!--/row-->

        </div>

    </section>

    <!-- ========================  New products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">New Products</h2>
                {{-- <div class="text">
                        <p>
                            Find your perfect match <a href="products-grid.html" class="btn btn-main">View all</a>
                        </p>
                    </div> --}}
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->

                @foreach ($newProducts as $product)
                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                {{-- <span class="add-favorite">
                                        <a href="javascript:void(0);" data-title="Add to favorites"
                                            data-title-added="Added to favorites list">
                                            <i class="icon icon-heart"></i>
                                        </a>
                                    </span> --}}
                                {{-- <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span> --}}
                            </div>
                            <div class="btn btn-add">
                                <a href="{{ route('frontend.cart.add', [$product->id, $product->slug, 'bulk']) }}"
                                    style="color: white"><i class="icon icon-cart"></i></a>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a
                                        href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                        <img src="{{ asset($product->thumb_small) }}" alt="{{ $product->title }}" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a
                                            href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a>
                                    </h2>
                                    <sub>$ {{ $product->price }}</sub>
                                    <sup>$
                                        {{ $product->price - $product->price * ($product->discount_amount / 100) }}</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div> <!--/row-->

        </div>

    </section>

    <!-- ========================  Sale products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Sale Products</h2>
                {{-- <div class="text">
                        <p>
                            Find your perfect match <a href="products-grid.html" class="btn btn-main">View all</a>
                        </p>
                    </div> --}}
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->

                @foreach ($saleProducts as $product)
                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                {{-- <span class="add-favorite">
                                        <a href="javascript:void(0);" data-title="Add to favorites"
                                            data-title-added="Added to favorites list">
                                            <i class="icon icon-heart"></i>
                                        </a>
                                    </span> --}}
                                {{-- <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span> --}}
                            </div>
                            <div class="btn btn-add">
                                <a href="{{ route('frontend.cart.add', [$product->id, $product->slug, 'bulk']) }}"
                                    style="color: white"><i class="icon icon-cart"></i></a>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a
                                        href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                        <img src="{{ asset($product->thumb_small) }}" alt="{{ $product->title }}" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a
                                            href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a>
                                    </h2>
                                    <sub>$ {{ $product->price }}</sub>
                                    <sup>$
                                        {{ $product->price - $product->price * ($product->discount_amount / 100) }}</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div> <!--/row-->

        </div>

    </section>
@endsection
