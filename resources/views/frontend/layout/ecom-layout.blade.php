<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    @stack('css')
</head>

<body>

    <div class="page-loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="wrapper">

        <!-- ======================== Navigation ======================== -->

        @include('frontend.includes.header')


        @yield('mainContent')


        <!-- ================== Footer  ================== -->
        @include('frontend.includes.footer')

    </div> <!--/wrapper-->

    @include('frontend.includes.script')

    @stack('script')
</body>

</html>
