@extends('frontend.layout.ecom-layout')

@section('mainContent')

    <!-- ========================  Header Content ======================== -->
    <section class="header-content">
        <h2 class="d-none">Slider Element</h2>
        <div class="container-fluid">
            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">
                @foreach ($bannerImages as $bannerImage)
                    <div class="item d-flex align-items-center justify-content-center position-relative" 
                         style="background-image:url({{ asset($bannerImage->image) }}); height: 400px; background-size: cover; background-position: center;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                        <div class="caption text-center text-white position-relative">
                            <h3 class="animated" data-start="fadeInUp" style="font-size: 2.5rem; font-weight: bold;">Welcome to <span style="color: #8a3636;">Refresh for a Cause!</span></h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================  Video Section ======================== -->
    <section class="video-section py-5 mt-3" style="background: linear-gradient(90deg, #2F855A, #48BB78); color: #fff;">
        <div class="text-center">
            <h2 class="section-title mb-4 text-white">Watch Our Story</h2>
            <div class="video-container" style="max-width: 800px; margin: 0 auto;">
                <video class="w-100 rounded shadow" controls style="max-height: 500px;">
                    <source src="{{ asset('/frontend/assets/images/rf/rfv1.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    <!-- ========================  About Section ======================== -->
    <section class="about-section py-5" style="background: #F0FFF4; color: #333;">
        <div class="container text-center">
            <h2 class="section-title mb-4" style="color: #2F855A;">About Refresh for a Cause</h2>
            <p class="lead text-muted mb-4">
                We’re more than just fundraising – we’re parents who saw a need for a better, more practical way to help organizations raise money.
            </p>
            <p class="text-muted mb-5">
                That’s why we created Refresh for a Cause, a simple, effective way to raise funds through water bottle and tumbler sales that everyone can use and appreciate.
            </p>
            <div class="row">
                @foreach (['rf1.jpeg', 'rf2.jpeg', 'rf4.jpeg'] as $image)
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('/frontend/assets/images/rf/' . $image) }}" alt="About Us" class="img-fluid rounded shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================  Fundraising Benefits Section ======================== -->
    <section class="fundraising-benefits-section py-5" style="background: #48BB78; color: #fff;">
        <div class="container text-center">
            <h2 class="section-title mb-4">Fundraising Made Easy</h2>
            <p class="text-light mb-5">
                When your organization partners with us, you’ll receive <strong>50% of all profits</strong> from each sale, directly supporting your cause. 
                Our hassle-free system ensures all items are shipped directly to buyers.
            </p>
        </div>
    </section>

    <!-- ========================  Features Section ======================== -->
    <section class="features-section py-5" style="background: #F7FAFC; color: #333;">
        <div class="container">
            <h2 class="section-title text-center mb-5" style="color: #2F855A;">Why Choose Us?</h2>
            <div class="row text-center">
                @foreach ([
                    ['title' => 'Simple Setup', 'image' => 'img-3.png', 'text' => 'Start raising money quickly with our easy-to-follow process.'],
                    ['title' => 'High-Quality Products', 'image' => 'img-3.png', 'text' => 'Eco-friendly and practical, our water bottles and tumblers are something supporters will use every day.'],
                    ['title' => 'Direct Delivery', 'image' => 'img-3.png', 'text' => 'No sorting, handling, or distribution for your team. We handle it all and ship straight to your supporters.']
                ] as $feature)
                    <div class="col-md-4">
                        <div class="feature-box p-4 border rounded shadow-sm" style="background: #fff;">
                            <img src="{{ asset('frontend/assets/images/' . $feature['image']) }}" alt="{{ $feature['title'] }}" class="img-fluid mb-3 rounded" style="height: 150px; object-fit: cover;">
                            <h5 style="color: #48BB78;">{{ $feature['title'] }}</h5>
                            <p class="text-muted">{{ $feature['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================  Call to Action ======================== -->
    <section class="cta-section py-5 text-center position-relative" style="background: linear-gradient(to right, #2F855A, #48BB78); color: #fff;">
        <div class="container">
            <h2 class="mb-4" style="font-weight: bold;">Join Us Today!</h2>
            <p class="lead mb-4">
                Join us in making fundraising refreshingly easy, meaningful, and efficient. Together, we can support the things that matter most.
            </p>
            <a href="{{url('store/products/water-bottle/1')}}" class="btn btn-success btn-lg shadow-lg">Get Started</a>
        </div>
    </section>

@endsection
