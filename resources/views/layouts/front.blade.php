<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AirWing Parking!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="front_assets/img/AWP favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front_assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front_assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front_assets/css/style.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small class="text-danger"> <a href="https://www.google.com/maps/place/5th+Floor,+169+Great+Portland+St,+London+W1W+5PF,+UK/@51.521664,-0.1435643,17z/data=!4m15!1m8!3m7!1s0x48761ad65de83cb7:0x32ff6b052ba455e5!2s5th+Floor,+169+Great+Portland+St,+London+W1W+5PF,+UK!3b1!8m2!3d51.5215705!4d-0.1435214!16s%2Fg%2F11s48_fl9b!3m5!1s0x48761ad65de83cb7:0x32ff6b052ba455e5!8m2!3d51.5215705!4d-0.1435214!16s%2Fg%2F11s48_fl9b" target="_blank">
                        &nbsp; 167-169 Great Portland Street,
                        &nbsp; 5th Floor,
                        &nbsp; London,
                        &nbsp; W1W 5PF</a></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small class="text-danger">24 / 7 Services</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small><a href="tel:+44 770 802 0222"> +44 770 802 0222
                    </a></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-envelope text-primary me-2"></small>
                    <small><a href="mailto:bookings@airwingparking.co.uk"> bookings@airwingparking.co.uk
                    </a></small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">
                <img height="55px" width="120px" src="{{ asset('front_assets/img/AWP logo.png') }}">
                </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link @stack('/')">Home</a>

                <a href="/service" class="nav-item nav-link @stack('service')">Services</a>
                <a href="/why-us" class="nav-item nav-link @stack('why-us')">Why us</a>
                @if(Auth::guard('customer')->check())
                <a href="/testimonial" class="nav-item nav-link @stack('testimonial')">TESTIMONIAL</a>
                @endif

                <a href="/contact" class="nav-item nav-link @stack('contact')">Contact Us</a>
                {{-- <a href="/flogin" class="nav-item nav-link">Login</a> --}}

                    @if(Auth::guard('customer')->check())

                    <ul class="navbar-nav navbar-right">

                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <i class="fa fa-user fa-fw text-primary"></i><b>
                                {{Auth::guard('customer')->user()->customer_fname}}
                            </b></a>
                            <div class="dropdown-menu dropdown-menu-right pullDown ">
                                <div class="dropdown-title text-sm">
                                <a href="/customer-logout" class="dropdown-item has-icon text-danger"> <i
                                        class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                        @else
                        <a class= "clogout">
                        <a href="/registration" class="nav-item nav-link @stack('registration')">Signup</a>
                    <a class="nav-item nav-link @stack('flogin')" href="/flogin"><i class="fa fa-user text-primary"></i>&nbsp;<b>Login</b> </a> </li>
                    @endif



            </div>
            @if (Auth::guard('customer')->check())
            <a href="/" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Book now<i class="fa fa-arrow-right ms-3"></i></a>
            @else
            <a href="/flogin" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Book now<i class="fa fa-arrow-right ms-3"></i></a>

            @endif
        </div>

    </nav>
    <!-- Navbar End -->


    {{$slot}}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>&nbsp; 167-169 Great Portland Street
                        ,<br>
                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5th Floor
                        ,&nbsp;London, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W1W 5PF </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="tel:+44 770 802 0222" class="text-white">+44 770 802 0222</a></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><a href="mailto:bookings@airwingparking.co.uk"class="text-white">bookings@airwingparking.co.uk</a></p>

                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 05.00 PM</p>
                    <h6 class="text-light">Saturday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div> --}}
                <div class="col-lg-4 col-md-6">
                    {{-- <h4 class="text-light mb-4">Services</h4> --}}
                    <h4 class="text-light mb-4">More Details</h4>
                    <a class="btn btn-link" href="/faq">FAQs</a>
                    <a class="btn btn-link" href="/terms">Terms & Conditions</a>
                    {{-- <a class="btn btn-link" href="">Privacy Policy</a> --}}
                    <a class="btn btn-link" href="/direction">Directions</a>
                    {{-- <a class="btn btn-link" href="">Vacuam Cleaning</a> --}}
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Secure Payments</h4>
                    <p>Get more with your budget payments... </p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <img height="30x" width="55px" src="{{ asset('front_assets/img/mastercard1.png') }}">
                        <img height="45px" width="55px" src="{{ asset('front_assets/img/visa.jpg') }}">
                        <img height="30px" width="55px" src="{{ asset('front_assets/img/paypal1.jpg') }}">
                        <img height="30px" width="55px" src="{{ asset('front_assets/img/visaelectron1.jpg') }}">
                        <img height="30px" width="55px" src="{{ asset('front_assets/img/Maestro.jpg') }}">

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;&nbsp;<script>document.write(new Date().getFullYear())</script>&nbsp; <a class="border-bottom" href="#">Airwing Parking</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> --}}
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="/">Home</a>
                            <a href="/terms">Terms</a>
                            <a href="/contact">Contact</a>
                            <a href="/faq">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front_assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front_assets/js/main.js')}}"></script>
    
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

    @stack('script')
</body>

</html>
