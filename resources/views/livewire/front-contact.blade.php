@push('contact', 'active')
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(front_assets/img/bg-img-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact US</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                <h1 class="mb-5 text-primary">Airwing Meet and Greet - Airport Parking
                </h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase"> Booking </h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i><a
                                        href="mailto:bookings@airwingparking.co.uk" style="word-wrap: break-word;">
                                        bookings@airwingparking.co.uk</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase"> Contact Number</h5>
                                <p class="m-0"><i class="fa fa-phone text-primary me-2"></i><a href="tel:+447708020222">
                                        +44 770 802 0222</a></p>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Technical //</h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://maps.google.com/maps?q=37%20Byerly%20Place,%20Downs%20Barn,%20Milton%20Keynes,%20England,%20MK14%207LZ&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>

                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        {{-- <p class="mb-4">Trust in dreams, for in them is hidden the gate to eternity.</p> --}}
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('new_name') is-invalid @enderror"
                                            id="name" placeholder=" Name" wire:model="new_name">
                                        <label for="name">Name<font color="red">*</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email"
                                            class="form-control @error('new_email') is-invalid @enderror" id="email"
                                            placeholder="Your Email" wire:model='new_email'>
                                        <label for="email">Email<font color="red">*</font></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('new_title') is-invalid @enderror"
                                            id="Title" placeholder="Title" wire:model='new_title'>
                                        <label for="Title">Title<font color="red">*</font></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('new_complain') is-invalid @enderror"
                                            placeholder="Leave a message here" id="message" style="height: 150px"
                                            wire:model='new_complain'></textarea>
                                        <label for="message">Message<font color="red">*</font></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" wire:click='saveData'> Send
                                        Message</button>
                                </div>
                                @if (session()->has('message'))
                                <div class="col-12">
                                    <div x-transition.duration.500ms x-data="{ open: true }"
                                        x-init="setTimeout(() => { open = false }, 2000)" x-show="open"
                                        class="alert alert-success mb-0" id="alert">
                                        {{-- <button type="button" class="close btn btn-sm"
                                            data-dismiss="alert">X</button> --}}
                                        <div style="text-align:center"> {{ session('message') }} </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>