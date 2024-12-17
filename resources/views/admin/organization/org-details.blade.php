@extends('admin.layout.default')

@section('pageTitle')
    Organization | Details
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Details of {{ $org->first_name }}</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content m-t-15" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <div class="d-md-flex align-items-center">
                                        <div class="text-center text-sm-left ">
                                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                <img src="
                                                @if (!$org->image) https://ui-avatars.com/api/?name={{ $org->full_name }}&background=f3f3f3&color=444444
                                                @else
                                                {{ asset($org->image) }} @endif
                                                "
                                                    alt="profile_image">
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-left m-v-15 p-l-30">
                                            <h2 class="m-b-5">{{ $org->full_name }}</h2>
                                            <p class="text-opacity font-size-13">
                                                {{ $org->mapped_role }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="d-md-block d-none border-left col-1"></div>
                                        <div class="col">
                                            <ul class="list-unstyled m-t-10">
                                                <li class="row">
                                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                        <span>Email: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ $org->email }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                        <span>Phone: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ $org->phone }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                        <span>Address: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ $org->address }}</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid #000; display: block; width: 100%; margin: 10px 0;">
                                <div class="col-md-6 col-lg-3">
                                    <a href="{{route('manage.orders.org', [$org->id, 'all'])}}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                                                        <i class="anticon anticon-profile"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <h2 class="m-b-0" style="font-size: 27px">{{$orderCount}}</h2>
                                                        <p class="m-b-0 text-muted" style="font-size: 10px">Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
