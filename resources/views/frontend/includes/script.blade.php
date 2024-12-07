    <!--Scripts -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('frontend/js/bigtext.js') }}"></script>
    <script src="{{ asset('frontend/vendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/toastr-setup.js') }}"></script>
    @yield('pluginScript')

    <script>
        @if (session('alert'))
            @if (session('alert')['type'] == 'success')
                toastr.success("{{ session('alert')['msg'] }}")
            @elseif (session('alert')['type'] == 'error')
                toastr.error("{{ session('alert')['msg'] }}")
            @elseif (session('alert')['type'] == 'warning')
                toastr.warning("{{ session('alert')['msg'] }}")
            @elseif (session('alert')['type'] == 'info')
                toastr.info("{{ session('alert')['msg'] }}")
            @endif
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
