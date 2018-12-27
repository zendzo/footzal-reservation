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
	
	<!-- appjs -->
	<script src="{{ asset('/js/app.js') }}" defer></script>

	<script>
		
	</script>


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body">

	@if (auth()->check())
	@include('layouts.Xenon.setting.pane')
	@endif
	
	<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="/" class="logo">
					<img src="{{ asset('Xenon/assets/images/logo-3-mazmur.png') }}" width="100" alt="" />
				</a>
				<a href="#" data-toggle="settings-pane" data-animate="true">
					<i class="linecons-cog"></i>
				</a>
			</div>
				
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<a href="#" data-toggle="settings-pane" data-animate="true">
						<i class="linecons-cog"></i>
					</a>
					
					<a href="#" data-toggle="user-info-menu-horizontal">
						<i class="fa-bell-o"></i>
						<span class="badge badge-success">7</span>
					</a>
					
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="#" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
			<!-- main menu -->
			<ul class="navbar-nav">
				@include('layouts.Xenon.header.navbar_horizontal')
			</ul>
					
			
			<!-- notifications and other links -->
			@if (auth()->check())
        @include('layouts.Xenon.header.user_horizontal_menu.right')
      @endif
	
		</div>
		
	</nav>
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		
		<div class="main-content">
			
			<div class="row" id="app">
				@yield('content')
			</div>
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
	</div>
	



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