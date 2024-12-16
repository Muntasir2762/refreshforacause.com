@extends('admin.layout.default')

@section('pageTitle')
    Dashboard
@endsection

@section('mainContent')
    <div class="row">
        {{-- Company Admin... --}}
        @if (Auth::user()->role == 'companyadmin')
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="anticon anticon-dollar"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">$23,523</h2>
                                <p class="m-b-0 text-muted">Profit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">+ 17.21%</h2>
                                <p class="m-b-0 text-muted">Growth</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">3,685</h2>
                                <p class="m-b-0 text-muted">Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">1,832</h2>
                                <p class="m-b-0 text-muted">Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Org Admin... --}}
        @if (Auth::user()->role == 'orgadmin')
            <div class="col-md-12 col-lg-12">
                <div class="card" onclick="copyAffiliateLink()" style="cursor: pointer;">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">Click to Copy Link</h2>
                                <p class="m-b-0 text-muted">Copy & Share Affiliate Link</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-purple">
                                    <i class="anticon anticon-user"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">1,832</h2>
                                    <p class="m-b-0 text-muted">Members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Organization's Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Member's Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">$ 0</h2>
                                    <p class="m-b-0 text-muted">Credit Balance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <hr style="border: 1px solid #000; display: block; width: 100%; margin: 10px 0;">

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Campaigns</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        {{-- Org Admin... --}}

        {{-- Org Member... --}}
        @if (Auth::user()->role == 'orgmember')
            <div class="col-md-12 col-lg-12">
                <div class="card" onclick="copyAffiliateLink()" style="cursor: pointer;">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">Click to Copy Link</h2>
                                <p class="m-b-0 text-muted">Copy & Share Affiliate Link</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">$ 0</h2>
                                    <p class="m-b-0 text-muted">Credit Balance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <hr style="border: 1px solid #000; display: block; width: 100%; margin: 10px 0;">

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Campaigns</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-md-6 col-lg-3">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0" style="font-size: 27px">3,685</h2>
                                    <p class="m-b-0 text-muted" style="font-size: 10px">Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        {{-- Org Member... --}}
    </div>
@endsection

@push('extra_script')
    <script>
        function copyAffiliateLink() {
            // Get the affiliate link URL dynamically
            const url = "{{ url('/?aff_id=' . Auth::user()->unique_ref) }}";

            // Create a temporary input element to copy the URL
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);

            // Select and copy the URL
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // Optional: Show a success message
            alert('Affiliate link copied to clipboard!');
        }
    </script>
@endpush
