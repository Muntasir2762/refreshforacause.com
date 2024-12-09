@extends('frontend.layout.ecom-layout')

@section('pageTitle')
    | Login
@endsection

@section('mainContent')
    <section class="login">

        <!--Content-->

        <div class="container">

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 offset-md-3">

                    <div class="login-wrapper">

                        <!--signin-->

                        <div class="login-block">

                            <div class="h4">Sign in <a href="{{ route('frontend.users.register') }}"
                                    class="btn btn-main btn-sm btn-register pull-right">Create an account</a></div>

                            <hr />

                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" required
                                                name="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" required
                                                name="password">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        {{-- <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId3">
                                            <label for="checkBoxId3">Remember me &nbsp;</label>
                                        </span> --}}
                                        {{-- <a href="#">Forgot
                                            password? Click here</a> --}}
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!--/signin-->

                    </div> <!--/login-wrapper-->

                </div> <!--/col-md-6-->

            </div>

        </div>
    </section>
@endsection
