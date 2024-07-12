<div class="tm-section tm-bg-img" id="tm-section-1">
  <div class="tm-bg-white ie-container-width-fix-2">
    <div class="container ie-h-align-center-fix ">
      <div class="row">
        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix mt-5">
          <form class="tm-search-form tm-section-pad-2">
            <div class="text-center">
              <h2 class="mb-4"><strong>Booking Form</strong></h2>
            </div>
            <div _ngcontent-sbe-c66 class="row border border-gray-400 rounded py-4 px-1 my-4">
              <h5>
                Customer Details</h5>
              <label>
                * <font color="red">Required Fields</font>
              </label>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3 ">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_customer_fname') is-invalid @enderror"
                    wire:model="new_customer_fname" placeholder="First Name *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_customer_lname') is-invalid @enderror"
                    wire:model="new_customer_lname" placeholder="Sur Name *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="email" class="form-control @error('new_customer_email') is-invalid @enderror"
                    wire:model="new_customer_email" placeholder="Email *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="number" class="form-control @error('new_customer_tphone') is-invalid @enderror"
                    wire:model="new_customer_tphone" placeholder="Contact Number *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_customer_address') is-invalid @enderror"
                    wire:model="new_customer_address" placeholder="Address *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3 mb-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_address_street') is-invalid @enderror"
                    wire:model="new_address_street" placeholder="Street *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_city') is-invalid @enderror" wire:model="new_city"
                    placeholder="City *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_zipcode') is-invalid @enderror"
                    wire:model="new_zipcode" placeholder="Postal Code *">
                </div>
              </div>
            </div>

            <div class="row border border-gray-400 rounded py-4 px-1 my-4">
              <h5>Booking Details</h5>
              <label>
                * <font color="red">Required Fields</font>
              </label>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="form-group">
                  <label>
                    Drop off Date
                  </label>
                  <input type="date" class="form-control @error('new_pick_date') is-invalid @enderror"
                    wire:model="new_pick_date" placeholder="Pick Date *" min="{{date('Y-m-d')}}">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="form-group">
                  <label>
                    Drop off Time
                  </label>
                  <input type="time" class="form-control @error('new_pick_time') is-invalid @enderror"
                    wire:model="new_pick_time" placeholder="Pick time *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="form-group">
                  <label>
                    Return Date
                  </label>
                  <input type="date" class="form-control @error('new_return_date') is-invalid @enderror"
                    wire:model="new_return_date" placeholder="Return Date *" min="{{date('Y-m-d')}}">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="form-group">
                  <label>
                    Return time
                  </label>
                  <input type="time" class="form-control @error('new_return_time') is-invalid @enderror"
                    wire:model="new_return_time" placeholder="Return time *">
                </div>
              </div>

              <br>
              <br>
              <br>

              <div class="col-12 col-md-12 col-lg-12 mb-3">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_return_flight_no') is-invalid @enderror"
                    wire:model="new_return_flight_no" placeholder="Return Flight No. *">
                </div>
              </div>
            </div>

            <div class="row border border-gray-400 rounded py-4 px-1 my-4">
              <h5>Car Details</h5>
              <label>
                *<font color="red">Required Fields</font>
              </label>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-4">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_car_registration_no') is-invalid @enderror"
                    wire:model="new_car_registration_no" placeholder="Car Reg. No. *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-4">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_car_make') is-invalid @enderror"
                    wire:model="new_car_make" placeholder="Car make *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-4">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_car_model') is-invalid @enderror"
                    wire:model="new_car_model" placeholder="Car Model *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-4">
                <div class="form-group">
                  <input type="text" class="form-control @error('new_car_color') is-invalid @enderror"
                    wire:model="new_car_color" placeholder="Car Color *">
                </div>
              </div>

              <br>
              <br>

              <div class="col-12 col-md-3 col-lg-4">
                <div class="form-group">
                  <select class="form-control @error('new_car_wash') is-invalid @enderror" name="new_car_wash"
                    id="new_car_wash" wire:model="new_car_wash">
                    <option value="">Car Wash</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row border border-gray-400 rounded py-4 px-1 my-4">
              <h5>Payment</h5>
              <label>
                *<font color="red">Required Field</font>
              </label>

              <br>
              <br>

              <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <select class="form-control @error('new_payment_method') is-invalid @enderror"
                    name="new_payment_method" id="new_payment_method" wire:model="new_payment_method">
                    <option value="">Payment Method</option>
                    <option value="Cash">Cash</option>
                    <option value="Card">Card&nbsp;&nbsp;&nbsp;(Contact Airwing Parking)
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row border border-gray-400 rounded py-4 px-1 my-4">
              <div class="mt-3">
                <div>
                  <h3 class="mt-2 mb-4 text-left" style="font-weight:900; color:red">Your Booking Amount
                    is <b class="text-dark">£&nbsp;{{$total}}</b> </h3>
                </div>
                <div class="my-1 mx-0">
                  <mat-checkbox _ngcontent-nla-c66="" name="tc"
                    class="mat-checkbox mat-accent ng-untouched ng-pristine ng-valid" id="mat-checkbox-2">
                    <input type="checkbox" class="mat-checkbox-input cdk-visually-hidden" wire:model="tc"
                      id="mat-checkbox-2-input" tabindex="0" name="tc" aria-checked="false">
                    I agree to the <a href="/terms" target="_blank"><u>Terms&nbsp;of&nbsp;service.</u></a>
                  </mat-checkbox>
                </div>

                <br>

                <div class="text-right">
                  <button type="button" wire:click="saveData" @disabled($tc!=true) class="btn btn-success ">
                    <div wire:loading wire:target="saveData">
                      <img src="{{ asset('front_assets/img/loading-gif.gif') }}" alt="" height="20px">&nbsp;
                    </div>
                    <span>Book Now</span>
                  </button>
                  <a type="button" class="btn btn-danger " href="/">Back</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
  window.addEventListener('BookedSuccessfully', event => {
            swal("Good job!", "Booked Successfully!", "success");

            setInterval(locationChange, 2000);
        });

        function locationChange() {
            location.assign("/");
        }
</script>
@endpush