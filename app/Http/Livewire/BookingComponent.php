<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;

use App\Models\booking;
use App\Models\Customer;

use Livewire\WithPagination;

class BookingComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action =[];

    public $view = [];

    public $paid_amount;

    public $searchKey;
    // public $key = 0;
    public $message = "";

    //open model insert
    public function openModel()
    {
       //  $this->validation=FALSE;

        $this->clearData();
        $this->dispatchBrowserEvent('insert-show-form');

    }

     //reload page
     public function reloadPage()
     {
         $this->dispatchBrowserEvent('reload-page');
     }

    //close model insert
    public function closeModel()
    {
        $this->dispatchBrowserEvent('insert-hide-form');
    }

    // public function saveData()
    // {
    //     $this->validate(
    //         [
    //             'paid_amount' => 'required',
    //         ]
    //         );

    //     $data = new booking();
    //     $data ->paid_amount = $this->paid_amount;
    //     $data ->save();

    //     //show success message
    //     session()->flash('message', 'Saved Successfully!');

    //     //clear data
    //     $this->clearData();
    //     $this->dispatchBrowserEvent('insert-hide-form');
    //     $this->dispatchBrowserEvent('reload-page');

    // }

    // public function updateRecord($id)
    // {
    //     $this->openModel();
    //     $data = booking::find($id);
    //     $this->paid_amount = $data->paid_amount;
    //     $this->key = $id;
    //     $this->booking_id = $id;
    // }

    // public function clearData()
    // {
    //     $this->key =0;
    //     $this->paid_amount="";
    // }

    // open view model
    public $view_id = 0;

    public function openViewModel( $id )
    {
        $this->view = booking::select('bookings.*')
        ->where('bookings.id','=',$id)
        ->get();
        $this->dispatchBrowserEvent('view-show-form');
    }

    public function viewCloseModel()
    {
        $this->dispatchBrowserEvent('view-hide-form');
    }
    public function pageAction()
    {
        # code...
        $x = Route::currentRouteName();
        $data = DB::table('access_points')
        ->select('access_points.access_model_id','access_points.id as access_point','access_points.value', 'access_models.access_model')
        ->join('access_models', 'access_points.access_model_id', '=', 'access_models.id')
        ->where('access_models.access_model', '=',$x)
        ->get();

       $access = session()->get('Access');
       for( $i=0; $i<sizeof($data); $i++ ){
            if(in_array($data[$i]->access_point,$access )){
                array_push($this->page_action,$data[$i]->value);
            }
        }
    }

    public function fetchData()
    {
        # code...
    }
    public function render()
    {
        $this->pageAction();
        $this->fetchData();

        if(!$this->searchKey){
            $items= DB :: table('bookings')
            ->select('bookings.*')
            // ->join('customers','bookings.customer_id','=','customers.id')
            ->latest()
            ->paginate(10);
        }
        else{
            $items= DB::table('bookings')
            ->select('bookings.*')
            // ->join('customers','bookings.customer_id','=','customers.id')
            ->where('bookings.first_name','LIKE','%'.$this->searchKey.'%')
            ->orWhere('bookings.booking_number','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('bookings.pick_date','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('bookings.pick_time','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('bookings.depature_date','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('bookings.depature_time','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }


        return view('livewire.booking-component',['items'=>$items])->layout('layouts.master');
    }
}
