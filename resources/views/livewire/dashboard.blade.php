@push('dashboard', 'active')
<div>

    <head>
        <style>
            #dashboard {
                background: linear-gradient(45deg, rgb(255, 154, 159) 0%, rgba(255, 240, 240, 1) 100%);
                background-size: 200%;
                background-position: right;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.17), 0 5px 10px rgba(0, 0, 0, 0.17);
                transition: 0.6s ease;
                border-radius: 20px;
            }

            .banner-img{
                transition: 0.6s ease;
            }

            .banner-img:hover{
                transform: translateX(-0.5rem) scale(1.01);
            }

            #dashboard:hover{
                transform: translateY(-0.5rem) scale(1.01);
                box-shadow: 0 20px 40px rgba(65, 0, 0, 0.145), 0 4px 8px rgba(77, 0, 0, 0.14);
                background: linear-gradient(231deg, rgba(255, 194, 196, 1) 0%, rgba(255, 240, 240, 1) 100%);
                

            }

            
            #airwing {
                box-shadow: 0 10px 20px rgba(184, 62, 62, 0.12), 0 4px 8px rgba(255, 0, 0, 0.105);
                transition: 0.6s ease;
            }

            #airwing:hover {
                transform: scale(1.02);
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
                border-radius: 10px;
            }

            .card:hover {
                box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
            }

            .centerpro {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <!-- Title-->
    <div class="row mb-4">
        <div class="centerpro col-md-5 col-sm-12 col-xs-12 text-center" align="center">
            <h3 class="text-center p-3" id="airwing"
                style="color:#da171c;background-color:#e4e4e4;border-radius: 20px;"><img
                    src="assets/img/dashboard/AWP logo copy.png" width="50" alt=""><b> Airwing
                    Parking - </b>
                <span class="text-dark"> Admin</span>
            </h3>
        </div>
    </div>
    <!-- Status cards-->
    <div class="row ">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="/customer" class="text-decoration-none">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Customers</h5>
                                        <h2 class="mb-3 font-15">
                                            {{ $CustomerCount }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/Customer.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="/booking" class="text-decoration-none">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Today Booking</h5>
                                        <h2 class="mb-3 font-15">
                                            {{$bookingtodayCount}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/today_booking.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="/booking" class="text-decoration-none">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Today Income </h5>
                                        <h2 class="mb-3 font-15">
                                            £ {{ number_format(($bookingtodayamountCount),2) }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/today_amount.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="/booking" class="text-decoration-none">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Total Bookings</h5>
                                        <h2 class="mb-3 font-15">
                                            {{number_format( $bookingCount)}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/total_booking.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="/booking" class="text-decoration-none">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Total Income </h5>
                                        <h2 class="mb-3 font-15">
                                            £ {{ number_format(($bookingamountCount),2)}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/total_payment.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card" id="dashboard">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-18" style="color:#da171c;"> Total Finish </h5>
                                        <h2 class="mb-3 font-15">
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/dashboard/total finished.png" width="160" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}

    </div>
    <!-- Status cards End -->

    <div class="row">

        <div class="col-12 col-md-4">
            <!-- <h6 class="text-right mt-2 ">Search Student</h6> -->
        </div>
        <div class="col-12 col-md-8">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" placeholder="Search Customer Here..." class="form-control" wire:model="searchKey">
                    <div class="input-group-append">
                        <button class="btn search-btn" wire:click="fetchData">Search</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Search End -->
    <!-- Table -->
    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-rounded table-hover ">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th style="color:#da171c">No</th>
                                    <th style="color:#da171c">First Name</th>
                                    <th style="color:#da171c">Sur Name</th>
                                    <th style="color:#da171c">Contact</th>
                                    <th style="color:#da171c">Email</th>
                                </tr>
                            </thead>
                            @php($x = 1)
                            @foreach ($list_data as $row)
                            <tr class="text-center">
                                <td>{{ $x }}</td>
                                <td>{{ $row->customer_fname }}</td>
                                <td>{{ $row->customer_sname }}</td>
                                <td>{{ $row->customer_tp }}</td>
                                <td>{{ $row->customer_email }}</td>
                            </tr>
                            @php($x++)
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.main.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://cdnjs.cloundflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.main.js"></script>

    <script>
        $(document).ready(function() {
        $("#formOpen").click(function() {
            $("#div3").fadeIn(500);
        });

        $("#formClose").click(function() {
            $("#div3").fadeOut();
        });
    });

    
    </script>