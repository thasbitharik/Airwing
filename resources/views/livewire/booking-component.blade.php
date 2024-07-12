@push('booking', 'active')

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
            <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i>Booking</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-md-4">
        </div>

        <div class="col-12 col-md-8">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="searchKey" wire:keyup="fetchData" placeholder="Search Here With Booking Details..."
                        aria-label="">
                    <div class="input-group-append">
                        <button class="btn search-btn" wire:click="fetchData">Search</button>
                    </div>
                    {{-- <button id="formOpen" wire:click="openModel" class="btn btn-info ml-1"><i class="fa fa-plus"
                            aria-hidden="true"></i> Create-New
                    </button> --}}
                </div>
            </div>
        </div>


    </div>

    @if (session()->has('message'))
    <div x-transition.duration.500ms x-data="{open: true}" x-init="setTimeout(() => {open = false}, 1500) "
        x-show="open" class="alert alert-success" id="alert" style="height:40px">
        {{-- <button type="button" class="close btn btn-sm" data-dismiss="alert" style="margin-top: -7px">X</button>
        --}}
        <div style="margin-top: -3px"> {{ session('message') }} </div>
    </div>
    @endif


    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="p-4">
                    <h4>Booking </h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Booking Number</th>
                                <th>Customer</th>
                                <th>Pick Date</th>
                                <th>Pick Time</th>
                                <th>Depature Date</th>
                                <th>Depature Time</th>
                                <th>Actions</th>
                            </tr>
                            {{-- @php($x = 1) --}}
                            @foreach ($items as $row)
                            <tr class="text-center">
                                <td>{{ $items->firstItem() + $loop->iteration -1 }}</td>
                                <td>{{$row->booking_number}}</td>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->pick_date}}</td>
                                <td>{{ date('h:i A', strtotime($row->pick_time)) }}</td>
                                <td>{{$row->depature_date}}</td>
                                <td>{{ date('h:i A', strtotime($row->depature_time)) }}</td>

                                <td>

                                    {{-- @if (in_array('Update', $page_action))
                                    <a href="#" class="text-info" wire:click="updateRecord({{ $row->id }})"><i
                                            class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    @endif --}}

                                    @if (in_array('View', $page_action))
                                    <a href="#" class="text-info mr-1" wire:click="openViewModel({{ $row->id }})">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    @endif


                                </td>
                            </tr>
                            {{-- @php($x++) --}}
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-6 ml-2">
                                Showing {{$items->firstItem()}} - {{$items->lastItem()}} of {{$items->total()}}
                            </div>
                        </div>
                        <div class="float-right mr-3">
                            {{$items->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Insert model here --}}
    <div wire:ignore.self class="modal fade" id="insert-model" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="col-12 col-md-6 col-lg-6">

                    <div class="form-group">
                        <label>
                            <font color="red">*</font> Payment
                        </label>
                        <input type="number" class="form-control" wire:model="paid_amount" placeholder=" Payment"
                            id="pamt" max="amount">

                        @error('paid_amount')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <div class="text-right">
                    <button type="button" wire:click="closeModel" class="btn btn-danger m-t-15 waves-effect">Close
                    </button>
                    <button type="button" wire:click="saveData"
                        class="btn btn-success m-t-15 waves-effect">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--end model--}}

    {{-- view model here --}}
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="view-model" tabindex="-1" role="dialog"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                @if (sizeOf($view) != 0)
                <div class="modal-header">
                    <h5 class="modal-title " id="formModal">
                        Booking Information - <small style="color: #da171c">{{ $view[0]->booking_number }}</small> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- view function --}}
                <div class="modal-body">
                    <div class="row gutters-sm">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="mb-4" style="color: #da171c; font-size:20px">
                                        <i class="fas fa-pound-sign mr-1" style="color:#000000;font-size:20px"></i>
                                        Payment Details
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Amout</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            £ {{ number_format($view[0]->paid_amount, 2)}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Payment Method</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->payment_method }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-4 pb-4" style="background-color: #f1d7d7; border-radius:10px">
                                        <div class="col-sm-5">
                                            <h6 class="text-dark mb-2 mt-2"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Print Invoice Here...</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            <button id="print" onclick="printContent();"
                                                class="btn btn-warning btn-icon"><i class="fas fa-print"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="mb-4" style="color: #da171c; font-size:20px">
                                        <i class="fa fa-user mr-1" style="color:#000000;"></i>
                                        Customer Details
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>First Name</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->first_name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Sur Name</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->last_name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Email</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->customer_email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Contact No.</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->customer_contact_no }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Address</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->address }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Street</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->street }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>City</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->city }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Postal Code</h6>
                                        </div>
                                        <div class="col-sm-7 text-dark font-weight-bold">
                                            {{ $view[0]->postal_code }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="mb-4" style="color: #da171c; font-size:20px">
                                        <i class="fa fa-car mr-1" style="color:#000000;"></i>
                                        Vehicle Details
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Car Reg. No.</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->car_reg_number }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"> <i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Car Make</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->car_make }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Car Model</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->car_model }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Color</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->color }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Car Wash</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->car_wash }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="mb-4" style="color: #da171c; font-size:20px">
                                        <i class="fa fa-calendar mr-1" style="color:#000000;"></i>
                                        Booking Details
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Arrival Date</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->pick_date }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Arrival Time</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ date('h:i A', strtotime($view[0]->pick_time)) }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Departure Date</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->depature_date }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Departure Time</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ date('h:i A', strtotime($view[0]->depature_time)) }}                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0"><i class="fa fa-dot-circle mr-1"
                                                    style="color:#575757; font-size:14px"></i>Flight No.</h6>
                                        </div>
                                        <div class="col-sm-6 text-dark font-weight-bold">
                                            {{ $view[0]->return_flight_number }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="button" wire:click="viewCloseModel"
                                    class="btn btn-danger m-t-15 waves-effect">Close
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- print - start --}}
    @if ((sizeOf($view) != 0) && isset($view[0]->booking_number))
    <div id="printDocument" style="display: none;">
        <div>
            <style>
                .row {
                    --bs-gutter-x: 1.5rem;
                    --bs-gutter-y: 0;
                    display: flex;
                    flex-wrap: wrap;
                    margin-top: calc(var(--bs-gutter-y) * -1);
                    margin-right: calc(var(--bs-gutter-x) / -2);
                    margin-left: calc(var(--bs-gutter-x) / -2);
                }

                .row>* {
                    flex-shrink: 0;
                    width: 100%;
                    max-width: 100%;
                    padding-right: calc(var(--bs-gutter-x) / 2);
                    padding-left: calc(var(--bs-gutter-x) / 2);
                    margin-top: var(--bs-gutter-y);
                }

                .col {
                    flex: 1 0 0%;
                }

                .col-1 {
                    flex: 0 0 auto;
                    width: 8.33333%;
                }

                .col-2 {
                    flex: 0 0 auto;
                    width: 16.66667%;
                }

                .col-3 {
                    flex: 0 0 auto;
                    width: 25%;
                }

                .col-4 {
                    flex: 0 0 auto;
                    width: 33.33333%;
                }

                .col-5 {
                    flex: 0 0 auto;
                    width: 41.66667%;
                }

                .col-6 {
                    flex: 0 0 auto;
                    width: 50%;
                }

                .col-7 {
                    flex: 0 0 auto;
                    width: 58.33333%;
                }

                .col-8 {
                    flex: 0 0 auto;
                    width: 66.66667%;
                }

                .col-9 {
                    flex: 0 0 auto;
                    width: 75%;
                }

                .col-10 {
                    flex: 0 0 auto;
                    width: 83.33333%;
                }

                .col-11 {
                    flex: 0 0 auto;
                    width: 91.66667%;
                }

                .col-12 {
                    flex: 0 0 auto;
                    width: 100%;
                }
            </style>
            <div style="width:1110px; height:782px">
                <div class="row">
                    <div class="col-3">
                        <h6 style="font-weight:800;font-size:12px;color:rgb(0, 0, 0);margin-left:95px;text-align:left;">
                            {{ $view[0]->booking_number }}
                        </h6>
                    </div>
                    <div class="col-3">
                        <h6 style="font-weight:800;font-size:12px;color:rgb(0, 0, 0);margin-left:-25px;text-align:left">
                            {{ $view[0]->car_reg_number }}
                        </h6>
                    </div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-left:-55px;margin-top:27px;text-align:left">
                            {{ $view[0]->booking_number }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:15px;color:rgb(0, 0, 0);margin-top:-20px;margin-left:59px;text-align:left">
                            {{ $view[0]->first_name }} {{ $view[0]->last_name }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:-22px;margin-left:59px;text-align:left">
                            {{ $view[0]->customer_contact_no }}
                        </h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:87px;margin-left:70px;text-align:left">
                            {{ $view[0]->car_make }}
                        </h6>
                    </div>
                    <div class="col-2">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:88px;margin-left:-35px;text-align:left">
                            {{ $view[0]->color }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:-18px;margin-left:74px;text-align:left">
                            {{ $view[0]->car_model }}
                        </h6>
                    </div>
                    <div class="col-2">
                        <h6
                            style="font-weight:800;font-size:13px;color:rgb(0, 0, 0);margin-top:-17px;margin-left:-66px;text-align:left">
                            {{ $view[0]->car_reg_number }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:34px;margin-left:89px;text-align:left">
                            {{ $view[0]->depature_date }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:7px;margin-left:89px;text-align:left">
                            {{ $view[0]->pick_date }}
                        </h6>
                    </div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:19px;margin-left:-11px;text-align:left">
                            {{ $view[0]->booking_number }} <b></b>
                        </h6>
                    </div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:19px;margin-left:-11px;text-align:left">
                            {{ $view[0]->car_reg_number }} <b></b>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:-29px;margin-left:160px;text-align:left">
                            {{ $view[0]->return_flight_number }}
                        </h6>
                    </div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:5px;margin-left:-13px;text-align:left">
                            {{ $view[0]->car_make }} &nbsp;/&nbsp; {{ $view[0]->car_model }}
                        </h6>
                    </div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:5px;margin-left:-13px;text-align:left">
                            {{ $view[0]->color }}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h6
                            style="font-weight:800;font-size:15px;color:rgb(0, 0, 0);margin-top:-32px;margin-left:80px;text-align:left">
                            £ {{ number_format($view[0]->paid_amount, 2)}}
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:-13px;margin-left:7px;text-align:left">
                            {{ $view[0]->depature_date }}
                        </h6>
                    </div>
                    <div class="col">
                        <h6 style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:-13px;text-align:left">
                            {{ date('h:i A', strtotime($view[0]->depature_time)) }}  
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col">
                        <h6
                            style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:6px;margin-left:3px;text-align:left">
                            {{ $view[0]->return_flight_number }}
                        </h6>
                    </div>
                    <div class="col">
                        <h6 style="font-weight:800;font-size:14px;color:rgb(0, 0, 0);margin-top:6px;text-align:left">

                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formOpen").click(function() {
            $("#div3").fadeIn(500);
        });
    });

    // this is for view
    window.addEventListener('view-show-form', event => {
            $('#view-model').modal('show');
        });
        window.addEventListener('view-hide-form', event => {
            $('#view-model').modal('hide');
        });

        function printContent() {
    var prtContent = document.getElementById("printDocument");
    var WinPrint = window.open();
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>