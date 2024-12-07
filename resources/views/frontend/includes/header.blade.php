<nav>
    <div class="container">
        <a href="{{ route('frontend.index') }}" class="logo">
            <img src="{{ asset('images/site/logo/logo.png') }}" style="width: 100px; height: 35px" />
        </a>

        <!-- ==========  Top navigation ========== -->

        <div class="navigation navigation-top clearfix">
            <ul>
                <!--add active class for current page-->
                <li class="left-side">
                    <a href="{{ route('frontend.index') }}" class="logo-icon">
                        <img src="{{ asset('images/site/logo/logo.png') }}" style="width: 80px; height: 38px"
                            alt="Alternate Text" />
                    </a>
                </li>
                <li><a href="{{ route('frontend.users.login') }}"><i class="icon icon-user"></i></a>
                </li>
                <li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a>
                </li>
                <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i>
                        <span>4</span></a></li>
            </ul>
        </div>

        <!-- ==========  Main navigation ========== -->

        <div class="navigation navigation-main">
            <a href="#" class="open-login"><i class="icon icon-user"></i></a>
            <a href="#" class="open-search"><i class="icon icon-magnifier"></i></a>
            <a href="#" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a>
            <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

            <div class="floating-menu">
                <!--mobile toggle menu trigger-->
                <div class="close-menu-wrapper">
                    <span class="close-menu"><i class="icon icon-cross"></i></span>
                </div>
                <ul>
                    <li>
                        <a href="#">Home</span></a>
                    </li>
                    <li>
                        <a href="#">Pages <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown navbar-dropdown-single">
                            <div class="navbar-box">
                                <div class="box-full">
                                    <div class="box clearfix">
                                        <ul>
                                            <li class="label">Addons</li>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="404.html">Not found 404</a></li>
                                            <li><a href="login.html">Login & Register</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-settings">
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
                    </li>
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

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/images/item-1.jpg" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">Product item</a></div>
                                <small>Product category</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="2" class="form-control form-quantity" />
                            </div>
                            <div class="price">
                                <span class="final">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>

                        <!--cart item-->

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/images/item-2.jpg" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">Product item</a></div>
                                <small>Product category</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="2" class="form-control form-quantity" />
                            </div>
                            <div class="price">
                                <span class="final">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>

                        <!--cart item-->

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/images/item-3.jpg" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">Product item</a></div>
                                <small>Product category</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="2" class="form-control form-quantity" />
                            </div>
                            <div class="price">
                                <span class="final">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>

                    </div>

                    <hr />

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Shipping</strong>
                            </div>
                            <div>
                                <span>$ 30,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>$ 59,00</span>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Total</strong>
                            </div>
                            <div>
                                <div class="h4 title">$ 1259,00</div>
                            </div>
                        </div>
                    </div>


                    <!--cart navigation -->

                    <div class="cart-block-buttons clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="products-grid.html" class="btn btn-outline-info">Continue
                                    shopping</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="checkout-1.html" class="btn btn-outline-warning"><span
                                        class="icon icon-cart"></span> Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
