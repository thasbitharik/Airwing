@push('registration', 'active')
<div>
    <style>
        .register-card {
            transition: 0.3s ease;
        }

        .register-card:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(front_assets/img/bg-img-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <section class="gradient-custom">
        <div class="container py-3 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration register-card wow fadeInUp" data-wow-delay="0.1s"
                        style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">

                            <h3>Registration Form</h3>
                            <h6 class="mb-4  pb-md-0 mb-md-5">
                                * &nbsp;<font color="red"> Required Fields </font>
                            </h6>
                            @if (session()->has('message'))
                            <div x-transition.duration.500ms x-data="{open: true}"
                                x-init="setTimeout(() => {open = false}, 1500) " x-show="open"
                                class="alert alert-success" id="alert" style="height:40px">
                                {{-- <button type="button" class="close btn btn-sm" data-dismiss="alert"
                                    style="margin-top: -7px">X</button>
                                --}}
                                <div style="margin-top: -3px"> {{ session('message') }} </div>
                            </div>
                            @endif

                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="firstName"
                                                class="form-control form-control-lg  @error('new_customer_fname') is-invalid @enderror"
                                                placeholder="First Name *" wire:model="new_customer_fname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="lastName"
                                                class="form-control form-control-lg  @error('new_customer_sname') is-invalid @enderror"
                                                placeholder="Sur Name *" wire:model="new_customer_sname" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="number"
                                                class="form-control form-control-lg  @error('new_customer_tp') is-invalid @enderror"
                                                id="contact" placeholder="Telephone Number *"
                                                wire:model="new_customer_tp" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="email"
                                                class="form-control form-control-lg  @error('new_customer_email') is-invalid @enderror"
                                                id="email" placeholder="Email *" wire:model="new_customer_email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" id="password"
                                                class="form-control form-control-lg  @error('new_password') is-invalid @enderror"
                                                name="password" placeholder="Password *" wire:model="new_password"
                                                required autocomplete="current-password" />
                                            <i class="bi bi-eye-slash" id="togglePassword" onclick="myFunction();"
                                                style="float:right; margin-top:-35px; margin-right:18px;cursor: pointer;"></i>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" id="c_password"
                                                class="form-control form-control-lg  @error('new_confirm_password') is-invalid @enderror"
                                                name="c_password" placeholder="Confirm password *"
                                                wire:model="new_confirm_password" required
                                                autocomplete="current-password" />
                                            <i class="bi bi-eye-slash" id="togglePassword1" onclick="myFunction1();"
                                                style="float:right; margin-top:-35px; margin-right:18px;cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="address"
                                                class="form-control form-control-lg  @error('new_address') is-invalid @enderror"
                                                placeholder="Address *" wire:model="new_address" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="Street"
                                                class="form-control form-control-lg  @error('new_street') is-invalid @enderror"
                                                placeholder="Street *" wire:model="new_street" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text"
                                                class="form-control form-control-lg  @error('new_city') is-invalid @enderror"
                                                id="city" placeholder="City *" wire:model="new_city" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="Street"
                                                class="form-control form-control-lg  @error('new_postal_code') is-invalid @enderror"
                                                placeholder="Postal Code *" wire:model="new_postal_code" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 pt-2">
                                    {{-- <input class="btn btn-primary btn-lg" type="submit" value="Submit" /> --}}
                                    <button type="button" class="btn btn-primary btn-lg " wire:click='saveData'>
                                        <div wire:loading wire:target="saveData">
                                            <img src="{{ asset('front_assets/img/loading-gif.gif') }}" alt=""
                                                height="20px">&nbsp;
                                        </div>
                                        Submit
                                    </button>
                                    <br>
                                    <br>
                                    <h6>Already have an account?
                                        <a href="flogin" class="link-danger"> Click here to Login</a>
                                    </h6>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    //password
    function myFunction() {
    document.getElementById("togglePassword").classList.toggle("bi-eye");

    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    //confirm password
    function myFunction1() {
    document.getElementById("togglePassword1").classList.toggle("bi-eye");

    var x = document.getElementById("c_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    // window.addEventListener('loaderShow', event => {
    //         $(".loader-loader").show();
    //     });

        window.addEventListener('RegisterdSuccessfully', event => {
            swal("Good job!", "Registerd Successfully!", "success");

            setInterval(locationChange, 2000);
        });

        function locationChange() {
            location.assign("/flogin");
        }

</script>
@endpush