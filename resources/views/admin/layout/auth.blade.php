<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('pageTitle')
    </title>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"
            style="background-color: rgba(209, 216, 224,1.0) !important;">
            <div class="d-flex flex-column justify-content-between w-100">

                @yield('mainContent')

                <div class="d-none d-md-flex p-h-40 justify-content-center">
                    <span class="">© {{ date('Y') }} App name</span>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

</body>

</html>
