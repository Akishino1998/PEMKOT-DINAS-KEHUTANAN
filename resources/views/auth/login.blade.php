<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Admitro - Admin Panel HTML template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template"/>

		<!-- Title -->
		<title>Owafs Tech - Login</title>
		<!--Favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link id="theme" href="{{ asset('assets/colors/color1.css') }}" rel="stylesheet" type="text/css"/>

	</head>
	<body class="h-100vh bg-primary">
		<div class="box">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>

		<div class="page">
			<div class="page-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="">
								<div class="text-white">
									<div class="card-body">
										<h2 class="display-4 mb-2 font-weight-bold error-text text-center"><strong>Login</strong></h2>
										<h4 class="text-white-80 mb-7 text-center">Selamat Datang</h4>
										<div class="row">
											<div class="col-9 d-block mx-auto">
												<form class="theme-form" id="" method="POST" action="{{ route('login') }}">
													@csrf
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<i class="fas fa-mail-bulk"></i>
															</div>
														</div>
														<input class="form-control  @error('email') is-invalid @enderror" type="email" required="" placeholder="email@gmail.com" value="{{ old('email') }}" name="email">
														@error('email')
															<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
														@enderror
													</div>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<i class="fas fa-key    "></i>
															</div>
														</div>
														<input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
														@error('password')
															<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
														@enderror
													</div>
													<div class="row">
														<div class="col-12">
															<button type="submit" class="btn  btn-secondary btn-block px-4">Login</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-none d-md-flex align-items-center">
							{{-- <img src="{{ asset('assets/images/png/login.png') }}" alt="img"> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>