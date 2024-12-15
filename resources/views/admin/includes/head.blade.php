<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
    @yield('pageTitle')
</title>
<link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}">
<link href="{{ asset('admin/assets/vendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
{{-- Datatable.. --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
{{-- Datatable.. --}}
@yield('pluginCss')
<link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/toastr/css/toastr.css') }}">
@yield('css')
