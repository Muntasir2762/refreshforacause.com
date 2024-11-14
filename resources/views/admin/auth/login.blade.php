@extends('admin.layout.auth')

@section('pageTitle')
    Login
@endsection

@section('mainContent')
    <div class="container d-flex h-100">
        <div class="row align-items-center w-100">
            <div class="col-md-7 col-lg-5 m-h-auto">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between m-b-30">
                            <img class="img-fluid" alt="" src="{{ asset('admin/assets/images/logo/logo.png') }}">
                            <h2 class="m-b-0">Login</h2>
                        </div>
                        <form>
                            <div class="form-group">
                                <label class="font-weight-semibold" for="email">Email:</label>
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-user"></i>
                                    <input type="text" class="form-control" id="email" placeholder="Email"
                                        name="email" autofocus autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-semibold" for="password">Password:</label>
                                {{-- <a class="float-right font-size-13 text-muted" href="">Forget
                                    Password?</a> --}}
                                <div class="input-affix m-b-10">
                                    <i class="prefix-icon anticon anticon-lock"></i>
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
