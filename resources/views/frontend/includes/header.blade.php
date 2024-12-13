<nav>
    <div class="container">
        <a href="{{ route('frontend.index') }}" class="logo">
            <img src="{{ asset($siteSettings->logo_dir.'/'.$siteSettings->logo_file_name) }}" style="width: 100px; height: 35px" alt="refreshforacause" />
        </a>

        <!-- ==========  Top navigation ========== -->

        <div class="navigation navigation-top clearfix">
            <ul>
                <!--add active class for current page-->
                <li class="left-side">
                    <a href="{{ route('frontend.index') }}" class="logo-icon">
                        <img src="{{ asset($siteSettings->logo_dir.'/'.$siteSettings->logo_file_name) }}" style="width: 80px; height: 38px"
                            alt="refreshforacause" />
                    </a>
                </li>
                <li><a href="{{ route('frontend.users.login') }}"><i class="icon icon-user"></i></a>
                </li>
                <li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a>
                </li>
                <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i>
                        <span>{{$cartItems->count()}}</span></a></li>
            </ul>
        </div>

        <!-- ==========  Main navigation ========== -->

        <div class="navigation navigation-main">
            <a href="{{ route('frontend.users.login') }}" class="open-login"><i class="icon icon-user"></i></a>
            <a href="#" class="open-search"><i class="icon icon-magnifier"></i></a>
            <a href="#" class="open-cart"><i class="icon icon-cart"></i> <span>{{$cartItems->count()}}</span></a>
            <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

            <div class="floating-menu">
                <!--mobile toggle menu trigger-->
                <div class="close-menu-wrapper">
                    <span class="close-menu"><i class="icon icon-cross"></i></span>
                </div>
                <ul>
                    <li>
                        <a href="{{route('frontend.index')}}">Home</span></a>
                    </li>
                    <li>
                        <a href="#">Product Categories <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown navbar-dropdown-single">
                            <div class="navbar-box">
                                <div class="box-full">
                                    <div class="box clearfix">
                                        <ul>
                                            @foreach ($categories as $category)
                                            <li><a href="{{route('frontend.products.all', [$category->slug, $category->id])}}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    {{-- <li class="nav-settings">
                        <a href="javascript:void(0);"><span class="nav-settings-value">USD</span> <span
                                class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown navbar-dropdown-single">
                            <div class="navbar-box">
                                <div class="box-full">
                                    <div class="box clearfix">
                                        <ul class="nav-settings-list">
                                            <li><a href="javascript:void(0);">USD</a></li>
                                            <li><a href="javascript:void(0);">EUR</a></li>
                                            <li><a href="javascript:void(0);">GBP</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- ==========  Search wrapper ========== -->

        <div class="search-wrapper">
            <input class="form-control" placeholder="Search..." />
            <button class="btn btn-outline-dark btn-sm">Search now</button>
        </div>


        <!-- ==========  Cart wrapper ========== -->

        <div class="cart-wrapper">
            <div class="checkout">
                <div class="clearfix">

                    <!--cart item-->

                    <div class="row">

                        @php
                            $subTotal = 0;
                        @endphp
                        @foreach ($cartItems as $cart)
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="{{ route('frontend.products.details', ['id' => $cart->product->id, 'slug' => $cart->product->slug]) }}"><img src="{{ asset($cart->product->thumb_large) }}" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">{{$cart->product->title}}</a></div>
                                <small>{{$cart->product->category->name}}</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="{{$cart->qty}}" class="form-control form-quantity" readonly/>
                            </div>
                            <div class="price">
                                <span class="final">$ {{$cart->price}}</span>
                                {{-- <span class="discount">$ 2.666</span> --}}
                            </div>
                            <!--delete-this-item-->
                            <a href="{{route('frontend.cart.delete', [$cart->id])}}"><span class="icon icon-cross icon-delete"></span></a>
                        </div>
                        @php
                            $subTotal += $cart->price * $cart->qty;
                        @endphp
                        @endforeach
                    </div>

                    <hr />

                    <!--cart prices -->

                    <div class="clearfix">
                        {{-- <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div> --}}

                        {{-- <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Shipping</strong>
                            </div>
                            <div>
                                <span>$ 30,00</span>
                            </div>
                        </div> --}}

                        {{-- <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>$ 59,00</span>
                            </div>
                        </div> --}}
                    </div>

                    <hr />

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Total</strong>
                            </div>
                            <div>
                                <div class="h4 title">$ {{$subTotal}}</div>
                            </div>
                        </div>
                    </div>


                    <!--cart navigation -->

                    <div class="cart-block-buttons clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{route('frontend.index')}}" class="btn btn-outline-info">Continue
                                    shopping</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{route('frontend.cart.checkout.products')}}" class="btn btn-outline-warning"><span
                                        class="icon icon-cart"></span> Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
