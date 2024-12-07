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

                        <!--signup-->

                        <div class="login-block">

                            <div class="h4">Register now <a href="{{ route('frontend.users.login') }}"
                                    class="btn btn-main btn-sm btn-login pull-right">Already member? Sign In</a></div>

                            <hr />

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First name: *" required
                                                name="first_name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last name: *" required
                                                name="last_name">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email: *" required
                                                name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" required class="form-control" placeholder="Password: *"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" required class="form-control"
                                                placeholder="Retype Password: *" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- <hr /> --}}
                                        {{-- <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId1">
                                            <label for="checkBoxId1">I have read and accepted the <a href="#">terms</a>,
                                                as well as read and understood our terms of <a href="#">business
                                                    contidions</a></label>
                                        </span> --}}
                                        {{-- <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId2">
                                            <label for="checkBoxId2">Subscribe to exciting newsletters and great tips</label>
                                        </span>
                                        <hr /> --}}
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </div>

                                </div>
                            </form>
                        </div> <!--/signup-->

                    </div> <!--/login-wrapper-->

                </div> <!--/col-md-6-->

            </div>

        </div>
    </section>
@endsection
