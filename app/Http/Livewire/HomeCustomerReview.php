<?php

namespace App\Http\Livewire;

use App\Models\CustomerReview as CustomerReviewModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Route;
use Auth;

class HomeCustomerReview extends Component
{
    public $customerId = "";
    //new variable data management
    public $Title = "";
    public $Rate = "";
    public $Comment = "";
    public $review_data=[];


    public function fetchData()
    {
        $customer = Auth::guard('customer')->user();
        $this->customerId = $customer->id;

        $this->review_data = DB::table('customer_reviews')
            ->select('customer_reviews.*','customers.customer_fname')
            ->join('customers','customer_reviews.customer_id','=','customers.id')
            ->where('customer_reviews.status', '=', 1)
            ->orderByDesc('id')
            ->get();

    }

    public function saveData()
    {
        $this->validate(
            [
                'Title' => 'required|max:255',
                'Rate' => 'required',
                'Comment' => 'required|max:255'
            ]
        );

        //here insert data
        $data = new CustomerReviewModel();
        $data->customer_id = $this->customerId;
        $data->title = $this->Title;
        $data->rating = $this->Rate;
        $data->comments = $this->Comment;
        $data->save();

        //show success message
        session()->flash('message', 'Submitted Successfully!');
        
        //clear data
        $this->clearData();
        // return redirect('/testimonial');
    }

    public function clearData()
    {
        $this->Title = "";
        $this->Rate = "";
        $this->Comment = "";
    }

    public function render()
    {
        $this->fetchData();
        return view('livewire.home-customer-review')->layout('layouts.front');
    }
}