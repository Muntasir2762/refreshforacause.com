<!-- Core Vendors JS -->
<script src="{{ asset('admin/assets/js/vendors.min.js') }}"></script>
<!-- page js -->
<script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/dashboard-default.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/toastr-setup.js') }}"></script>
{{-- Datatable.. --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
{{-- Datatable.. --}}
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Toastr JS -->
@yield('pluginScript')
<!-- Core JS -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
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
@yield('script')
