@extends('admin.layout.default')

@section('pageTitle')
    Profile
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Profile</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Edit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                                aria-controls="password" aria-selected="false">Password</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-15" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <div class="d-md-flex align-items-center">
                                        <div class="text-center text-sm-left ">
                                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                <img src="
                                                @if (!Auth::user()->image) https://ui-avatars.com/api/?name={{ Auth::user()->full_name }}&background=f3f3f3&color=444444 @endif
                                                "
                                                    alt="profile_image">
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-left m-v-15 p-l-30">
                                            <h2 class="m-b-5">{{ Auth::user()->full_name }}</h2>
                                            <p class="text-opacity font-size-13">
                                                {{ Auth::user()->mapped_role }}
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
                                                    <p class="col font-weight-semibold">{{ Auth::user()->email }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                        <span>Phone: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ Auth::user()->phone }}</p>
                                                </li>
                                                <li class="row">
                                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                        <span>Address: </span>
                                                    </p>
                                                    <p class="col font-weight-semibold">{{ Auth::user()->address }}</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('be.profile.update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="First Name" value="{{ Auth::user()->first_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="First Name" value="{{ Auth::user()->last_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Company email" value="{{ Auth::user()->email }}" readonly>
                                            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control"
                                                placeholder="Company phone" value="{{ Auth::user()->phone }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" rows="5">{{ Auth::user()->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary text-uppercase" type="submit">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control" placeholder="Current password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control" placeholder="New password" required>
                                            <small class="text-muted">Minimum 6 Characters</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="retype_password">Retype Password</label>
                                            <input type="password" name="retype_password_confirmation"
                                                id="retype_password" class="form-control" placeholder="Retype password"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary text-uppercase" type="submit">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
