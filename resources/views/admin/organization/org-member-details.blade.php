@extends('admin.layout.default')

@section('pageTitle')
    Organization Member | Details
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Details of {{ $orgMember->full_name }}</h2>
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
                                                @if (!$orgMember->image) https://ui-avatars.com/api/?name={{ $orgMember->full_name }}&background=f3f3f3&color=444444
                                                @else
                                                {{ asset($orgMember->image) }} @endif
                                                "
                                                    alt="profile_image">
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-left m-v-15 p-l-30">
                                            <h2 class="m-b-5">{{ $orgMember->full_name }}</h2>
                                            <p class="text-opacity font-size-13">
                                                {{ $orgMember->mapped_role }}
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
                                                    <p class="col font-weight-semibold">{{ $orgMember->email }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                        <span>Phone: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ $orgMember->phone }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                        <span>Address: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ $orgMember->address }}</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid #000; display: block; width: 100%; margin: 10px 0;">
                                <div class="col-md-6 col-lg-3">
                                    <a href="{{route('manage.orders.org.member', [$orgMember->unique_ref, 'all'])}}">
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
