<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Customer;
use App\Models\booking;

use Livewire\Component;

class Dashboard extends Component
{

    public $list_data = [];

    public $searchKey ;

    public function fetchData()
    {
        if(!$this->searchKey){
            $this->list_data = [];

        }
        else{
            $this->list_data=DB::table('customers')
                            ->select('customers.*')
                            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
                            ->latest()
                            ->take(10)
                            ->get();
        }
    }
    public function render()
    {
        $this->fetchData();

        $CustomerCount=Customer::count('id');

        $bookingCount = booking::count('id');

        $bookingamountCount=booking::sum('paid_amount');

        $bookingtodayamountCount=booking::where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'),Carbon::now()->format('Y-m-d'))->sum('paid_amount');

        $bookingtodayCount=booking::where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'),Carbon::now()->format('Y-m-d'))->count('id');


        return view('livewire.dashboard',compact('CustomerCount','bookingCount','bookingamountCount','bookingtodayamountCount','bookingtodayCount'))->layout('layouts.master');
    }
}
