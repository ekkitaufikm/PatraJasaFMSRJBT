

<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Craft - Bootstrap 5 HTML Admin Dashboard Theme 
Purchase: https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	
<!-- Mirrored from preview.keenthemes.com/craft/authentication/sign-in/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2022 04:04:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8" />
		<meta property="og:url" content="https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme" />
		<meta property="og:site_name" content="Keenthemes | Craft" />
		<link rel="canonical" href="https://preview.keenthemes.com/craft" />
		<link rel="shortcut icon" href="{{ asset('assets/admin/assets/media/logos/favicon.png') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= '{{ asset('') }}{{ asset('') }}www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-20px bottom-5px w-xl-600px scroll-y">
						<!--begin::Header-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="{{ asset('landing') }}" class="py-9 pt-lg-20">
								<img alt="Logo" src="{{ asset('assets/admin/assets/media/logos/favicon.png') }}" class="h-70px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10">PT.Patra Jasa Facility Management</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="fw-bold fs-2 text-white">Sistem Layanan Pekerja PT.Patra Jasa
							<br />Facility Management Services Region Jawa Bagian Tengah</p>
							<!--end::Description-->
						</div>
						<!--end::Header-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/craft/index.html" action="{{url('loginProses')}}" method="POST">
								@csrf
								<!--begin::Logo-->
								@if (session()->has('sukses'))
								<div class="alert alert-success" role="alert">
									{{ session('sukses') }}
								</div>
								@elseif (session()->has('gagal'))
									<div class="alert alert-danger" role="alert">
										{{ session('gagal') }}
									</div>
								@endif
								<a href="{{ url('landing') }}" class="text-center mb-10">
									<center>
										<img alt="Logo" src="{{ asset('assets/admin/assets/media/logos/logo.png') }}"/>
									</center>
								</a><br>
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Selamat Datang</h1>
									<div class="text-gray-500 fw-semibold fs-6">Silahkan masukkan Nopeg dan Password untuk masuk sistem</div>
								</div>
								<!--begin::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Label-->
									<label class="form-label fs-6 fw-bolder text-dark">Nopeg</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control" name="nip" id="nip" placeholder="Nopeg">
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack mb-2">
										<!--begin::Label-->
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
										<!--end::Label-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Input-->
									<input type="password" class="form-control" name="password" id="password" placeholder="password">
									<!--end::Input-->
								</div>
								<!--begin::Actions-->
								<div class="text-center">
									<div class="d-grid mb-10">
										<button type="submit" name="login" class="btn btn-lg btn-bg-primary text-white btn-login w-100 mb-5">
											<span class="indicator-label">LOGIN</span>
										</button>
									</div>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<!--begin::Links-->
						<div class="text-dark order-2 order-md-1">
							<span class="text-gray-800 fw-bold me-1">Copyright © 2022</span>
							<a href="{{ url('login') }}" target="_blank" class="text-gray-800 text-hover-primary">PT.Patra Jasa</a>
							<span class="text-gray-800 fw-bold me-1">Facility Management Services Region Jawa Bagian Tengah</span>
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets/admin/assets/index.html') }}";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/admin/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/admin/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/admin/assets/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/craft/authentication/sign-in/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2022 04:04:18 GMT -->
</html>