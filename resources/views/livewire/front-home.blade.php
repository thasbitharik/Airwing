@push('/', 'active')
<div>
    <style>
        @media only screen and (max-width: 415px) {
            .booking-card {
                margin-bottom: 30px;
            }

            .slider-heading {
                font-size: 25px;
            }

            .service .service-icon {
                height: 215px;
            }
        }

        @media only screen and (min-width:820px) and (max-width:1180px) {
            .slider-bg-image {
                height: 400px;
            }
        }

        @media only screen and (min-width:540px) and (max-width:720px) {
            .booking-card {
                margin-bottom: 20px;
            }

            .slider-heading {
                font-size: 30px;
            }
        }

        .booking-card {
            transition: 0.3s ease;
        }

        .booking-card:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
        }
    </style>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 slider-bg-image" src="front_assets/img/bg-img-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div id="booking" class="section">
                                    <div class="section-center">
                                        <div class="container">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-7 mt-3 mb-1 text-center text-lg-start">
                                                    <h3
                                                        class="display-3 text-white mt-2 animated slideInDown slider-heading">
                                                        Welcome
                                                        To Airwing Parking...</h3>
                                                </div>
                                                <div class="col-md-6 col-lg-3 container-fluid  ">
                                                    <div class="card p-4 booking-card" style="border-radius: 20px ; ">
                                                        <div class="row">

                                                            <form>
                                                                <div class="form-group mb-2">
                                                                    <label style="color: black">
                                                                        <font color="red">*</font>
                                                                        Departure Date
                                                                    </label>
                                                                    <input name="check-in" style="margin-top: 5px"
                                                                        type="date" class="form-control"
                                                                        placeholder="Departure Date"
                                                                        wire:model='start_date'
                                                                        min="{{ date('Y-m-d') }}">
                                                                </div>

                                                                <div class="form-group mb-2">
                                                                    <label style="color: black">
                                                                        <font color="red">*</font>
                                                                        Return Date
                                                                    </label>
                                                                    <input name="check-out" style="margin-top: 5px"
                                                                        type="date" class="form-control"
                                                                        placeholder="Return Date" wire:model='end_date'
                                                                        min="{{ date('Y-m-d') }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label style="color: black">

                                                                        Promo Code
                                                                    </label>
                                                                    <input type="text" style="margin-top: 5px"
                                                                        placeholder="No active codes now..."
                                                                        class="form-control" wire:model="Promo"
                                                                        readonly>
                                                                    @error('Promo')
                                                                    <span class="text-danger text-sm">{{ $message
                                                                        }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div>
                                                                    <h6 class="mt-3 mb-3 text-left"
                                                                        style="font-weight:900; color:red">Your
                                                                        Booking Amount
                                                                        is <b class="text-dark">£&nbsp;{{$total}}</b>
                                                                    </h6>
                                                                </div>
                                                                @if(Auth::guard('customer')->check())

                                                                <div class="form-group ">
                                                                    <a type="button" class="btn btn-primary btn-lg"
                                                                        href="/booknow/{{$customerId}}/{{ $start_date}}/{{$end_date}}">
                                                                        Book Now </a>
                                                                </div>
                                                                @else

                                                                <div class="form-group ">

                                                                    <a type="button" class="btn btn-primary btn-lg"
                                                                        href="/flogin"> Book Now </a>
                                                                </div>
                                                                @endif
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="service mt-3" id="service">
        <div class="container ">
            <div class="section-header text-center wow zoomIn mb-5" data-wow-delay="0.1s">
                <h2>Our Valuable Services</h2>
            </div>
            <div class="row" style="text-align: justify">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <div class="service-text">
                            <h3>Simple</h3>
                            <p>
                                We've been operating Airport Parking services for years.
                                Our aim is to make the search, booking, payment and use of the service as straight
                                forward as possible.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-plane"></i>
                        </div>
                        <div class="service-text">
                            <h3>Full Control</h3>
                            <p>
                                Once you've booked, if anything changes with your travel arrangements
                                just contact us via the website, email or phone and we will do our best to help.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="service-text">
                            <h3>Safety</h3>
                            <p>
                                Our fully insured team make sure you and your
                                family arrive at the airport on time whilst taking care of your car.
                                This form of airport parking is more affortable than other options
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="service-text">
                            <h3>Secure Payments</h3>
                            <p>
                                We use a third party payment gateway to assure the highest level of security. Pay for
                                your airport
                                parking with visa, Mastercard or PayPal. Quick, Easy and Safe.
                            </p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-handshake"></i>
                        </div>
                        <div class="service-text">
                            <h3>Price check promise</h3>
                            <p>
                                Find the same airport parking product for less and we'll refund the difference. No
                                question, no hassle.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Home Testimonial Start -->
    <section class="info blue wave-white d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
        <div class="container">
            <div class="section-title ">
                <h4 class="text-center">OUR CLIENTS</h4>
                <h1 class="text-center section-sub-title" style="font-size: 19px;">What our clients are saying about us.
                </h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach ($review_data as $row_R)
                <div class="item d-flex justify-content-center">
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="0.2s"
                        style="max-height: 210px;border-radius:20px;">
                        <div class="author-img" style="height: 70px; width:70px;">
                            <img alt="Image" class="img-fluid" src="front_assets/img/user0.png">
                        </div>
                        <div class="author">
                            <h4 class="name">{{ $row_R->customer_fname }}</h4>
                            <div class="location">{{ $row_R->title }}</div>
                        </div>
                        <div class="rating">
                            @for ($i = $row_R->rating; $i > 0; $i--)
                            <i class="fa fa-star voted" aria-hidden="true"></i>
                            @endfor
                        </div>
                        <div class="p-2 testimonial-comment"
                            style="background-color: rgb(255, 206, 206); border-radius: 5px; max-height:60px;overflow-y: scroll;">
                            <p class="pl-3 pr-3" style="max-width: 100%;word-wrap: break-word;">{{
                                $row_R->comments }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <style>
                #scroll-text {
                    width: 300px;

                }

                .slide-to-view {
                    background: -webkit-gradient(linear, left top, right top, color-stop(0, #000000), color-stop(0.4, #000000), color-stop(0.5, white), color-stop(0.6, #000000), color-stop(1, #000000));
                    -moz-background-clip: text;
                    -webkit-background-clip: text;
                    -moz-text-fill-color: transparent;
                    -webkit-text-fill-color: transparent;
                    -webkit-animation: slidetounlock 5s infinite;
                    font-size: 15px;
                    font-family: Arial;
                    font-weight: 300;
                    margin: auto;

                    padding: 0;
                    width: 200%;

                    -webkit-text-size-adjust: none;
                }

                @-webkit-keyframes slidetounlock {
                    0% {
                        background-position: -300px 0;
                    }

                    100% {
                        background-position: 300px 0;
                    }
                }
            </style>

            <div>
                <h5 id="scroll-text" class="text-center slide-to-view mt-4">Slide to view more...</h5>
            </div>
        </div>

    </section>
    <!-- Home Testimonial End -->

    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">857</h2>
                    <p class="text-white mb-0">Total Visitors</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">348</h2>
                    <p class="text-white mb-0">Total Bookings</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">42</h2>
                    <p class="text-white mb-0">Trusted Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">496</h2>
                    <p class="text-white mb-0">Completed Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

</div>