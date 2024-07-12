<?php

namespace App\Http\Livewire;
use App\Models\booking as BookingModel;
use App\Models\Customer as CustomerModel;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Mail\ConfirmMail;
use Illuminate\support\Facades\Mail;

use Route;
use Auth;
class BookNow extends Component
{
    public $list_data = [];
    public $view = [];
    public $customer_list = '';


    public $searchKey;
    public $key = 0;
    public $message = "";

    public $new_customer_fname = '';
    public $new_customer_lname = '';
    public $new_customer_email = '';
    public $new_customer_tphone = '';
    public $new_customer_address = '';
    public $new_address_street = '';
    public $new_city = '';
    public $new_zipcode = '';
    public $new_pick_date = '';
    public $new_pick_time = '';
    public $new_return_date = '';
    public $new_return_time = '';
    public $new_return_flight_no = '';
    public $new_car_registration_no = '';
    public $new_car_make= '';
    public $new_car_model= '';
    public $new_car_color= '';
    public $new_car_wash= '';
    public $new_payment_method= '';

    public $tc= '';

    public $amount= '';
    public $number_of_days;
    public $total;
    public $perDayRent = 18;
    public $customerId;
    public $new_booking_number;

    public function mount($customerId,$start_date,$end_date)
    {
        $this->new_pick_date = $start_date;
        $this->new_return_date = $end_date;
        $this->customer_list = $customerId;

        $booking_reference_last = BookingModel::orderByDesc('id')->first();
        if ($booking_reference_last) {
            $reference = $booking_reference_last->booking_number;
            $reference = (int)str_replace('AWP-#0000', '', $reference) + 1;
        } else {
            $reference = 1;
        }

        $this->new_booking_number = 'AWP-#0000' . $reference;
    }

    public function fetchData()
    {
        $customer = Auth::guard('customer')->user();
        $this->customerId = $customer->id;

        $from_date = Carbon::parse($this->new_pick_date);
        $to_date = Carbon::parse($this->new_return_date);

        if($from_date == $to_date){
            $this->number_of_days  = 1 ;
        }else{
            $this->number_of_days  = 1 + $from_date->diffInDays($to_date) ;
        }
        $this->total = $this->number_of_days * $this->perDayRent;
    }

    // insert and update data here
    public function saveData()
    {
        // $this->dispatchBrowserEvent('loaderShow');

        //validate data
        $this->validate(
            [
                'new_customer_fname' => 'required|max:30',
                'new_customer_lname' => 'required|max:30',
                'new_customer_email' => 'email|required',
                'new_customer_tphone' => 'required|max:12|min:10',
                'new_customer_address' =>'required',
                'new_address_street' => 'required',
                'new_city' => 'required',
                'new_zipcode' => 'required',
                'new_pick_date' => 'required',
                'new_pick_time' => 'required',
                'new_return_date' => 'required',
                'new_return_time' => 'required',
                'new_return_flight_no' => 'required',
                'new_car_registration_no' => 'required',
                'new_car_make' => 'required',
                'new_car_model' => 'required',
                'new_car_color' => 'required',
                'new_car_wash' => 'required',
                'new_payment_method' => 'required',

            ]
        );

        // $checkData = BookingModel::where('bookings.customer_fname',$this->new_customer_fname)
        //                 ->where('bookings.customer_lname',$this->new_customer_lname)
        //                 ->where('bookings.customer_email',$this->new_customer_email)
        //                 ->where('bookings.customer_tphone',$this->new_customer_tphone)
        //                 ->where('bookings.customer_address',$this->new_customer_address)
        //                 ->where('bookings.address_streetname',$this->new_address_street)
        //                 ->where('bookings.city',$this->new_city)
        //                 ->where('bookings.zipcode',$this->new_zipcode)
        //                 ->where('bookings.pickup_date',$this->new_pick_date)
        //                 ->where('bookings.pickup_time',$this->new_pick_time)
        //                 ->where('bookings.return_date',$this->new_return_date)
        //                 ->where('bookings.return_time',$this->new_return_time)
        //                 ->where('bookings.return_flight_no',$this->new_return_flight_no)
        //                 ->where('bookings.car_registration_no',$this->new_car_registration_no)
        //                 ->where('bookings.car_make',$this->new_car_make)
        //                 ->where('bookings.car_color',$this->new_car_color)
        //                 ->where('bookings.car_wash',$this->new_car_wash)
        //                 // ->where('bookings.payment_method',$this->new_payment_method)
        //                 ->where('bookings.total',$this->amount)
        //                 ->first();

        //             if($checkData){
        //                 session()->flash('message', 'Already Booked!');

        //             }
        //             else{
            //here insert data
            $data = new BookingModel();
            $data->booking_number = $this->new_booking_number ;
            $data->first_name = $this->new_customer_fname ;
            $data->last_name = $this->new_customer_lname ;
            $data->customer_email = $this->new_customer_email ;
            $data->customer_contact_no = $this->new_customer_tphone ;
            $data->address = $this->new_customer_address ;
            $data->street = $this->new_address_street ;
            $data->city = $this->new_city ;
            $data->postal_code = $this->new_zipcode ;
            $data->pick_date = $this->new_pick_date ;
            $data->pick_time = $this->new_pick_time ;
            $data->depature_date = $this->new_return_date ;
            $data->depature_time = $this->new_return_time ;
            $data->return_flight_number = $this->new_return_flight_no ;
            $data->car_reg_number = $this->new_car_registration_no ;
            $data->car_make = $this->new_car_make ;
            $data->car_model = $this->new_car_model ;
            $data->color = $this->new_car_color ;
            $data->car_wash = $this->new_car_wash ;
            $data->payment_method = $this->new_payment_method ;
            $data->paid_amount = $this->total ;
            $data->customer_id = $this->customer_list;
            $data->save();

            //  send mail useing alert
            //content
            $content_data = DB::table('bookings')
                ->select('bookings.*')
                ->where('bookings.id', '=', $data->id)
                ->first();

            // send mail
            Mail::to($content_data->customer_email)->send(new ConfirmMail($content_data));
            // Mail::to('bookings@airwingparking.co.uk')->send(new ConfirmMail($content_data));

            //clear data
            $this->clearData();

            $this->dispatchBrowserEvent('BookedSuccessfully');
    }

    //clear data
    public function clearData()
    {
        # emty field
        $this->key = 0;
        $this->new_reference_no = "";
        $this->new_customer_fname = "";
        $this->new_customer_lname = "";
        $this->new_customer_email = "";
        $this->new_customer_tphone = "";
        $this->new_customer_address = "";
        $this->new_address_street = "";
        $this->new_city = "";
        $this->new_zipcode = "";
        $this->new_pick_date = "";
        $this->new_pick_time = "";
        $this->new_return_date = "";
        $this->new_return_time = "";
        $this->new_return_flight_no = "";
        $this->new_car_registration_no = "";
        $this->new_car_make = "";
        $this->new_car_model = "";
        $this->new_car_color = "";
        $this->new_car_wash = "";
        $this->new_payment_method = "";
        $this->new_payment_status = "";
        $this->amount = "";
        $this->customer_list = "";

    }
    // public function SendMail($id)
    // {
    //     $content_data = "Subekka";

    //     mail::to("nisharu99@gmail.com")->send(new ConfirmMail($content_data));
    // }
    public function render()
    {
        $this->fetchData();
        return view('livewire.book-now')->layout('layouts.front');
    }
}
