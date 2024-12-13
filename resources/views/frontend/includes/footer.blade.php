<footer>

    <div class="container-fluid">

        <div class="footer-wrap">

            <div class="container">

                <!--footer showroom-->
                <div class="footer-showroom">
                    <div class="text-center">
                        <a href="{{ route('frontend.index') }}"><img
                                src="{{ asset($siteSettings->logo_dir . '/' . $siteSettings->logo_file_name) }}"
                                alt="refreshforacause" /></a>
                    </div>
                </div>

                <!--footer links-->
                <div class="footer-links">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Get to Know Us</h5>
                            <ul>
                                <li><a href="{{route('frontend.inner.about.us')}}">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <h5>Policy</h5>
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Payment Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <h5>Quick Links</h5>
                            <ul>
                                <li><a href="{{route('frontend.users.login')}}">Login</a></li>
                                <li><a href="{{route('frontend.users.register')}}">Registration</a></li>
                            </ul>
                        </div>
                        <div class="offset-md-3 col-md-3">
                            <h5>Contacts</h5>
                            <p>
                                <h5>Address</h5>
                                {{$siteSettings->address}}

                                <h5>Phone</h5>
                                {{$siteSettings->phone}}

                                <h5>Email</h5>
                                {{$siteSettings->email}}
                            </p>
                            {{-- <div class="form-group form-newsletter">
                                <input class="form-control" type="text" name="email" value=""
                                    placeholder="Email address" />
                                <input type="submit" class="btn btn-secondary btn-sm" value="Subscribe" />
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!--footer social-->

                <div class="footer-social">
                    <div class="row">

                        <div class="col-sm-6 links">
                            <ul>
                                <li><a href="{{$socialMedia[0]->link}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$socialMedia[1]->link}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$socialMedia[2]->link}}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$socialMedia[3]->link}}"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{$socialMedia[4]->link}}"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>
