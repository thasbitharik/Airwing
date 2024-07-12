<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\booking as BookingModel;
use App\Models\Customer as CustomerModel;
use App\Models\CustomerReview as CustomerReviewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Auth;

class FrontHome extends Component
{
    public $start_date;
    public $end_date;
    public $number_of_days;
    public $total;
    public $note;
    public $perDayRent = 18;
    public $customerId;

    public $review_data = [];

    public function mount()
    {
        $this->end_date = date('Y-m-d');
        $this->start_date = date('Y-m-d');

    }

    public function fetchData()
    {

        if (Auth::guard('customer')->user()) {
            $customer = Auth::guard('customer')->user();
            $this->customerId = $customer->id;

            $from_date = Carbon::parse($this->start_date);
            $to_date = Carbon::parse($this->end_date);

            if ($from_date == $to_date) {
                $this->number_of_days = 1;
            } else {
                $this->number_of_days = 1 + $from_date->diffInDays($to_date);
            }
            $this->total = $this->number_of_days * $this->perDayRent;

        } else {
            $from_date = Carbon::parse($this->start_date);
            $to_date = Carbon::parse($this->end_date);

            if ($from_date == $to_date) {
                $this->number_of_days = 1;
            } else {
                $this->number_of_days = 1 + $from_date->diffInDays($to_date);
            }
            $this->total = $this->number_of_days * $this->perDayRent;
        }

        //   $this->review_data=CustomerReviewModel::where('status', '=', '1')->get();

        $this->review_data = DB::table('customer_reviews')
            ->select('customer_reviews.*','customers.customer_fname')
            ->join('customers','customer_reviews.customer_id','=','customers.id')
            ->where('customer_reviews.status', '=', 1)
            ->latest()
            ->get();

    }

    public function render()
    {
        $this->fetchData();

        return view('livewire.front-home')->layout('layouts.front');
    }
}