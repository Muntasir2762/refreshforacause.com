@extends('frontend.layout.ecom-layout')

@section('mainContent')
    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <h2 class="d-none">Slider element</h2>

        <div class="container-fluid">

            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">

                <!-- Slide item -->
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
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> <!-- /owl-slider -->
        </div>
    </section>

    <!-- ========================  About Section ======================== -->

    <section class="about-section py-5">
        <div class="container text-center">
            <h2 class="section-title mb-4">About Refresh for a Cause</h2>
            <p class="lead mb-4">
                We’re more than just fundraising – we’re parents who saw a need for a better, more practical way to help organizations raise money. Tired of the usual fundraisers, we wanted something that’s not only easy but also offers lasting value.
            </p>
            <p class="mb-5">
                That’s why we created Refresh for a Cause, a simple, effective way to raise funds through water bottle and tumbler sales that everyone can use and appreciate.
            </p>
            <img src="{{ asset('frontend/assets/images/img-2.webp') }}" alt="About Us" class="img-fluid rounded">
        </div>
    </section>

    <!-- ========================  Features Section ======================== -->

    <section class="features-section py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4">
                        <img src="{{ asset('frontend/assets/images/img-3.png') }}" alt="Simple Setup" class="mb-3">
                        <h5>Simple Setup</h5>
                        <p>Start raising money quickly with our easy-to-follow process.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4">
                        <img src="{{ asset('frontend/assets/images/img-3.png') }}" alt="High-Quality Products" class="mb-3">
                        <h5>High-Quality Products</h5>
                        <p>Eco-friendly and practical, our water bottles and tumblers are something supporters will use every day.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4">
                        <img src="{{ asset('frontend/assets/images/img-3.png') }}" alt="Direct Delivery" class="mb-3">
                        <h5>Direct Delivery</h5>
                        <p>No sorting, handling, or distribution for your team. We handle it all and ship straight to your supporters.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================  Call to Action ======================== -->

    <section class="cta-section py-5 text-center" style="background-image:url({{ asset('frontend/assets/images/img-4.jpg') }});">
        <div class="container">
            <h2 class="text-white mb-4">Join Us Today!</h2>
            <p class="text-white lead mb-4">
                Join us in making fundraising refreshingly easy, meaningful, and efficient. Together, we can support the things that matter most.
            </p>
            <a href="#" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </section>
@endsection
