@extends('frontend.layout.ecom-layout')
@push('css')
    <style>
        .pagination {
            justify-content: center !important;
        }
    </style>
@endpush
@section('pageTitle')
    All Products
@endsection

@section('mainContent')
    <section class="products pt-0">

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    @if ($catProducts->count() > 0)
                        <li class="breadcrumb-item active" aria-current="page">{{ $catProducts[0]->category->name }}</li>
                        @else
                        <li class="breadcrumb-item active" aria-current="page">Not Availble</li>
                    @endif
                </ol>
                @if ($catProducts->count() > 0)
                    <h2 class="title">Product list of {{ $catProducts[0]->category->name }}</h2>
                @endif
                <div class="text">
                    <p>Total Products {{ $catProducts->count() }}</p>
                </div>
            </div>
        </header>

        <div class="container">

            <div class="row">

                {{-- <div class="col-12">

                    <!-- === product-filters === -->
                    <!--Replace all these dropdowns with HTML select/input using bootstrap class-->
                    {Replace all these dropdowns with HTML select/input using bootstrap class}
                    <div class="filters filters-top">
                        <div class="row">
                            <div class="col-lg-3">
                                <!--Colors-->
                                <div class="filter-box">
                                    <div class="title">
                                        Colors
                                    </div>
                                    <div class="filter-content">
                                        <div class="product-colors clearfix">
                                            <span class="color-btn color-btn-yellow"></span>
                                            <span class="color-btn color-btn-pink"></span>
                                            <span class="color-btn color-btn-orange"></span>
                                            <span class="color-btn color-btn-red"></span>
                                            <span class="color-btn color-btn-blue checked"></span>
                                            <span class="color-btn color-btn-green"></span>
                                            <span class="color-btn color-btn-gray"></span>
                                            <span class="color-btn color-btn-biege"></span>
                                            <span class="color-btn color-btn-black"></span>
                                            <span class="color-btn color-btn-white"></span>
                                        </div>
                                    </div>
                                    <div class="filter-update">Update</div>
                                </div> <!--/filter-box-->
                            </div>
                            <!--Price-->
                            <div class="col-lg-3">
                                <div class="filter-box">
                                    <div class="title">Price</div>
                                    <div class="filter-content">
                                        <div class="price-filter">
                                            <input type="text" id="range-price-slider" value="" name="range" />
                                        </div>
                                    </div>
                                    <div class="filter-update">Update</div>
                                </div>
                            </div>

                            <!--Type-->
                            <div class="col-lg-3">
                                <div class="filter-box">
                                    <div class="title">
                                        Type
                                    </div>
                                    <div class="filter-content">
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeIdAll" checked="checked">
                                            <label for="typeIdAll">All <i>(1200)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId1">
                                            <label for="typeId1">Sofa <i>(20)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId2">
                                            <label for="typeId2">Armchairs <i>(12)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId3">
                                            <label for="typeId3">Chairs <i>(80)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId4">
                                            <label for="typeId4">Dining tables <i>(140)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId5">
                                            <label for="typeId5">Media storage <i>(20)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId6">
                                            <label for="typeId6">Tables <i>(10)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId7">
                                            <label for="typeId7">Bookcase <i>(450)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId8">
                                            <label for="typeId8">Nightstands <i>(750)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId9">
                                            <label for="typeId9">Children room <i>(960)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId10">
                                            <label for="typeId10">Kitchen <i>(44)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId11">
                                            <label for="typeId11">Bathroom <i>(5)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId12">
                                            <label for="typeId12">Wardrobe <i>(80)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId13">
                                            <label for="typeId13">Shoe cabinet <i>(23)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId14">
                                            <label for="typeId14">Office <i>(24)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId15">
                                            <label for="typeId15">Bar sets <i>(92)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="radio" name="radiogroup-type" id="typeId16">
                                            <label for="typeId16">Lightning <i>(1120)</i></label>
                                        </span>
                                    </div>
                                    <div class="filter-update">Update</div>
                                </div> <!--/filter-box-->
                            </div>

                            <!--Material-->
                            <div class="col-lg-3">
                                <div class="filter-box">
                                    <div class="title">
                                        Material
                                    </div>
                                    <div class="filter-content">
                                        <span class="checkbox">
                                            <input type="checkbox" id="matId1">
                                            <label for="matId1">Blend <i>(1200)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="checkbox" id="matId2">
                                            <label for="matId2">Leather <i>(12)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="checkbox" id="matId3">
                                            <label for="matId3">Wood <i>(80)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="checkbox" id="matId4">
                                            <label for="matId4">Shell <i>(80)</i></label>
                                        </span>
                                        <span class="checkbox">
                                            <input type="checkbox" id="matId5">
                                            <label for="matId5">Metal <i>(80)</i></label>
                                        </span>
                                    </div>
                                    <div class="filter-update">Update</div>
                                </div> <!--/filter-box-->
                            </div>

                        </div><!--/row-->

                    </div> <!--/filters-->
                </div> --}}

                <!--Products-->

                <div class="col-12">

                    <!--Products collection-->

                    <div class="row">

                        <!--Product item-->

                        @foreach ($catProducts as $product)
                            <div class="col-6 col-lg-4">
                                <article>
                                    {{-- <div class="info">
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
                                </div> --}}
                                    <div class="btn btn-add">
                                        <a href="{{ route('frontend.cart.add', [$product->id, $product->slug, 'bulk']) }}"
                                            style="color: white"><i class="icon icon-cart"></i></a>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="badge badge-info">{{ ucFirst($product->trend_type) }}</span>
                                        <div class="image">
                                            <a
                                                href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                                <img src="{{ asset($product->thumb_large) }}" alt="{{ $product->title }}" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4">
                                                <a
                                                    href="{{ route('frontend.products.details', ['id' => $product->id, 'slug' => $product->slug]) }}">Lucy</a>
                                            </h2>
                                            <sub>$ {{ $product->price }}</sub>
                                            <sup>$
                                                {{ $product->price - $product->price * ($product->discount_amount / 100) }}</sup>
                                            <span class="description clearfix">
                                                Gubergren amet dolor ea diam takimata consetetur facilisis blandit et
                                                aliquyam
                                                lorem ea duo labore diam sit et consetetur nulla
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>


                    <!--Pagination-->
                    <div class="pagination-wrapper d-flex justify-content-center">
                        {!! $catProducts->links() !!}
                    </div>
                    {{-- <div class="pagination-wrapper">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div> --}}

                    <!-- === sort bar === -->

                    {{-- <div class="sort-bar clearfix">
                        <div class="sort-results pull-left">
                            <!--Showing result per page-->
                            <select>
                                <option value="1">10</option>
                                <option value="2">50</option>
                                <option value="3">100</option>
                                <option value="4">All</option>
                            </select>
                            <!--Items counter-->
                            <span>Showing all <strong>50</strong> of <strong>3,250</strong> items</span>
                        </div>
                        <!--Sort options-->
                        <div class="sort-options pull-right">
                            <span class="hidden-xs">Sort by</span>
                            <select>
                                <option value="1">Name</option>
                                <option value="2">Popular items</option>
                                <option value="3">Price: lowest</option>
                                <option value="4">Price: highest</option>
                            </select>
                        </div>
                    </div> --}}

                </div> <!--/product items-->

            </div><!--/row-->
        </div>

    </section>
@endsection
