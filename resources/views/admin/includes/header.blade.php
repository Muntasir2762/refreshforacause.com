<div class="header">
    <div class="logo logo-dark">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/site/logo/logo.png') }}" alt="Logo">
            <img class="logo-fold" src="{{ asset('images/site/fold-logo/fold_logo.png') }}" alt="Logo">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/site/logo/logo.png') }}" alt="Logo">
            <img class="logo-fold" src="{{ asset('images/site/fold-logo/fold_logo.png') }}" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>

        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="
                                                @if (!Auth::user()->avatar_image) https://ui-avatars.com/api/?name={{ Auth::user()->full_name }}&background=f3f3f3&color=444444
                                                @else
                                                {{ asset(Auth::user()->avatar_image) }} @endif
                                                "
                            alt="avatar">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="
                                                @if (!Auth::user()->avatar_image) https://ui-avatars.com/api/?name={{ Auth::user()->full_name }}&background=f3f3f3&color=444444
                                                @else
                                                {{ asset(Auth::user()->avatar_image) }} @endif
                                                "
                                    alt="avatar">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">
                                    {{ Auth::user()->first_name }}
                                </p>
                                <p class="m-b-0 opacity-07">
                                    {{ Auth::user()->mapped_role }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('be.profile.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Profile</span>
                            </div>
                        </div>
                    </a>
                    @if (Auth::user()->role === 'companyadmin')
                        <a href="{{ route('site-settings.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="anticon opacity-04 font-size-16 anticon-setting"></i>
                                    <span class="m-l-10">Settings</span>
                                </div>

                            </div>
                        </a>
                        <a href="{{ route('social-media.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="anticon opacity-04 font-size-16 anticon-global"></i>
                                    <span class="m-l-10">Social Media</span>
                                </div>

                            </div>
                        </a>
                        <a href="{{ route('tracking-script.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="anticon opacity-04 font-size-16 anticon-code"></i>
                                    <span class="m-l-10">Tracking Script</span>
                                </div>

                            </div>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" id='logoutForm'>
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item d-block p-h-15 p-v-10"
                            onclick="event.preventDefault();
                            document.getElementById('logoutForm').submit();">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                    <span class="m-l-10">Logout</span>
                                </div>

                            </div>
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
