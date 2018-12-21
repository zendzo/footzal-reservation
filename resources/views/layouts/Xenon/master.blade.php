<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">


	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

  <title>{{ $page_title or config('app.name') }}</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/fonts/linecons/css/linecons.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/fonts/fontawesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/xenon-core.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/xenon-forms.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/xenon-components.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/xenon-skins.css') }}">
	<link rel="stylesheet" href="{{ asset('Xenon/assets/css/custom.css') }}">

	<script src="{{ asset('Xenon/assets/js/jquery-1.11.1.min.js') }}"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" id="app">

	@include('layouts.Xenon.setting.pane')
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		@include('layouts.Xenon.sidebar.sidebar')
	
		<div class="main-content">
					
		@include('layouts.Xenon.header.navbar')
			<div class="row">
        @yield('content')
      </div>
			<br />
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
        @include('layouts.Xenon.footer.footer_inner')
			</footer>
		</div>
	
			
  {{-- @include('layouts.Xenon.chat.panel') --}}
	
	



	<!-- Bottom Scripts -->
	<script src="{{ asset('Xenon/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/TweenMax.min.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/resizeable.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/joinable.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/xenon-api.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/xenon-toggles.js') }}"></script>

	<!-- Sweet alert -->
	<script src="{{ asset ('js/sweetalert.min.js') }}" type="text/javascript"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('Xenon/assets/js/xenon-custom.js') }}"></script>

	@yield('script')
	<!-- flash_message -->
	@include('layouts.Xenon.flash.message')

</body>
</html>