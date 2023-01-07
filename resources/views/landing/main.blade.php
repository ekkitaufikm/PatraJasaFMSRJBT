
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/assets/media/logos/favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/assets/css/style.css') }}">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        // variabel global marker
        var marker;
        
        function taruhMarker(peta, posisiTitik){
            
            if( marker ){
            // pindahkan marker
            marker.setPosition(posisiTitik);
            } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
            }
        
            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
            
        }
        
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-7.604843000, 110.7968060),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        
        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        }


        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
        

    </script>
    <style>
        .logo img {
            width: 80%;
        }
        @media (min-width:1025px) {
            .logo {
                width: 40%;
            }
        }
    </style>
    
</head>
<body>

<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="header-top-content">
                    <div class="header-left">
                        <ul class="list-items">
                            <li><a href="#"><i class="la la-phone mr-1"></i>+6282124444815</a></li>
                            <li><a href="#"><i class="la la-envelope mr-1"></i>sc.assetmor4@pertamina.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header-top-content">
                    <div class="header-right d-flex align-items-center justify-content-end">
                        
                        <div class="header-right-action">
                            <a href="{{ url('login') }}" class="theme-btn theme-btn-small" style="border-radius:30px;">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-menu-wrapper padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="menu-wrapper">
                    <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            
                            <img src="{{ asset('assets/admin/assets/media/logos/logo.png') }}" alt="PatraJasa Logo" class="m-2">
                            
                        </a>
                        <div class="menu-toggler">
                            <i class="la la-bars"></i>
                            <i class="la la-times"></i>
                        </div><!-- end menu-toggler -->
                    </div><!-- end logo -->
                    <div class="main-menu-content">
                        <p class="copy__desc">
                            <marquee width="900px">Selamat Datang di Sistem Layanan Pekerja PT.Patra Jasa Facility Management Services Region Jawa Bagian Tengah</marquee>
                        </p>
                    </div><!-- end main-menu-content -->
                    
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div></header>
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START JOB-DETAILS AREA
================================= -->
@yield('content')
<!-- ================================
    END JOB-DETAILS AREA
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="{{ url('landing') }}" class="foot__logo"><img src="{{ asset('assets/admin/assets/media/logos/logo.png') }}" width="80%" alt="PatraJasa Logo" class="m-2"></a>
                    </div><!-- end logo -->
                    <p class="footer__desc" style="text-align:justify">Sistem Layanan Pekerja <b>PT.Patra Jasa Facility Management Services</b> Region Jawa Bagian Tengah</p>
                    <ul class="list-items pt-3">
                        <li>Jl. Pemuda No.114, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132</li>
                        <li>+62 (024) 3555628</li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2491910824333!2d110.4137391709584!3d-6.9798955155869615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b52f7eb0b8f%3A0xfbe542e7074e983d!2sPT.%20Pertamina%20-%20RJBT%204!5e0!3m2!1sid!2sid!4v1659819154939!5m2!1sid!2sid" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">

                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Subscribe now</h4>
                    <p class="footer__desc pb-3">Subscribe for latest updates & promotions</p>
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Go</button>
                                    <span class="font-size-14 pt-1"><i class="la la-lock mr-1"></i>Your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright © 2022 <a href="{{ url('landing') }}" target="_blank" class="text-gray-800 text-hover-primary">PT.Patra Jasa</a> Facility Management Services Region Jawa Bagian Tengah
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5" style="margin-top: 20px;">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>                            
                        <li><a href="#"><i class="lab la-youtube"></i></a></li>
                    </ul>
                </div>      
            </div><!-- end col-lg-4 -->
            <!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
<script src="{{ asset('assets/landing/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/animated-headline.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/jquery.ripples-min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/jquery.multi-file.min.js') }}"></script>
<script src="{{ asset('assets/landing/assets/js/main.js') }}"></script>
<!-- maps JS start-->
<script src="{{ asset('assets/landing/assets/js/gmap.js') }}"></script>
</body>
</html>