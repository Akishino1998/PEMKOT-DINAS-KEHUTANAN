<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Owafs Technology" name="description">
		<meta name="keywords" content="Aplikasi Surat"/>
		<link rel="shortcut icon" href="{{ asset('logo-kaltim.ico') }}" type="image/x-icon">
		<title>{{ config('app.name') }} | @yield('title')</title>
		<style>
			.form-control{
				color: black !important;
			}
			.select2-container--default .select2-results__option--highlighted[aria-selected]{
				color:black !important;
			}
			.selectgroup-input:checked+.selectgroup-button, .selectgroup-input:focus+.selectgroup-button{
			    background : #705ec8 !important;
			    color : white !important;
			}
			
		</style>
		@include('layouts.style')
		@livewireStyles
	</head>
	<body class="app sidebar-mini {{ (Auth::user()->role == 3 or Auth::user()->role == 2 or Request::is('pos*'))?'sidebar-gone sidenav-toggled':"" }}">
		<div class="page">
			<div class="page-main">
				<aside class="app-sidebar"  style="overflow:scroll">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="/">
							<img src="{{ asset('logo-black.png') }}" class="header-brand-img desktop-lgo">
							<img src="{{ asset('logo-owafs-penjualan1.png') }}" class="header-brand-img mobile-logo">
						</a>
					</div>
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body text-center">
							<div class="user-info">
								<h5 class=" mb-1">{{ Auth::user()->name }} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
							</div>
						</div>
					</div>
					@include('layouts.menu')
				</aside>
				<div class="app-content main-content">
					<div class="side-app">
						@include('layouts.header')
						@if (!Request::is('pos*'))
                       	 	@include('layouts.breadcrumb')
						@endif
						@yield('konten')
					</div>
				</div>
			</div>
			@include('layouts.footer')
		</div>
		<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
		@include('layouts.script')
	</body>
</html>

@livewireScripts