<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Mobile Web-app fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">

<!-- Meta tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">

<!--Title-->
<title>Refresh For a Cause @yield('pageTitle')</title>

<!--CSS bundle -->
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/bootstrap.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/animate.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/font-awesome.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/ion-range-slider.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/linear-icons.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/magnific-popup.css') }}" />
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/owl.carousel.css') }}" />
<link href="{{ asset('frontend/vendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/vendors/toastr/css/toastr.css') }}">
<link rel="stylesheet" media="all" href="{{ asset('frontend/css/theme.css') }}" />

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('css')
