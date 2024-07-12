<?php

namespace App\Http\Livewire;

use App\Models\CustomerReview;
use App\Models\Customer as CustomerModel;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Route;

use Livewire\WithPagination;

class CustomerReviewComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchKey;
    public $key = 0;
    public $message = '';
    public $page_action = [];

    public $customer_list=[];

    public $title = "";
    public $customer_fname = "";
    public $comments = "";
    public $status;
    public $approveby;

        public function statusChangeModel($id,$status)
        {
        # code...
        $this->selected_id=$id;
        $this->status=$status;
        //show popup
        $this->openStatusChangeModel();

        }

        //open popup
        public function openStatusChangeModel()
        {
        # code...
        $this->dispatchBrowserEvent('status-show-form');
        }

        // close popup
        public function closeStatusChangeModel()
        {
        # code...
        $this->dispatchBrowserEvent('status-hide-form');

        }

        public function saveStatusChangeModel()
        {
        # code...
        $data=CustomerReview::find($this->selected_id);
        $data->status=$this->status;
        $data->save();

        $this->statusClear();
        session()->flash('message', 'Status Change Successfully!');

        }


        public function statusClear()
        {
        # code...
        $this->selected_id=null;
        $this->status=null;
        $this->closeStatusChangeModel();
        }    

     //reload page
     public function reloadPage()
     {
         $this->dispatchBrowserEvent('reload-page');
     }
     //open model insert
     public function openModel()
     {
        //  $this->validation=FALSE;
 
         $this->clearData();
         $this->dispatchBrowserEvent('insert-show-form');
         
     }
      //close model insert
      public function closeModel()
      {
          $this->dispatchBrowserEvent('insert-hide-form');
      }

      public function saveData()
      {
             $data = CustomerReview::find($this->review_id);
             $data -> approve_by =$this->approveby;
 
             $data ->save();
             session()->flash('message','Update Successfully');
 
             $this -> clearData();
             $this->dispatchBrowserEvent('insert-hide-form');   
         // }
      }
     //fill box forupdate
     public function updateRecord($id)
     {
         # code...
         $this->openModel();
         $data = CustomerReview::find($id);
         $this->approveby=$data->approve_by;
         $this->key = $id;
         $this->review_id =$id;
     }
 
     public function clearData()
     {
         $this->key =0;
         $this->approveby="";
     }
 
     public function FetchData()
     {
         
     }
     public $view_id = 0;
     public function openViewModel($id)
     {
      # code...
      $this->view = CustomerReview::select('customer_reviews.*')
          ->where('customer_reviews.id','=',$id)
          ->get();
  
  
          $this->dispatchBrowserEvent('view-show-form');
     }
     //close model view
     public function viewCloseModel()
     {
         $this->dispatchBrowserEvent('view-hide-form');
  
         $this->view = [];
         $this->list = [];
         
     }

     #comon controls
     public function pageAction()
     {
         # code...
         $x = Route::currentRouteName();
         $data = DB::table('access_points')
             ->select(
                 'access_points.access_model_id',
                 'access_points.id as access_point',
                 'access_points.value',
                 'access_models.access_model'
             )
             ->join('access_models','access_points.access_model_id', '=','access_models.id')
             ->where('access_models.access_model', '=', $x)
             ->get();
 
         $access = session()->get('Access');
         for ($i = 0; $i < sizeof($data); $i++) {
             if (in_array($data[$i]->access_point, $access)) {
                 array_push($this->page_action, $data[$i]->value);
             }
         }
     }

    public function render()
    {
        $this->customer_list = CustomerModel::get();

        if(!$this->searchKey){
            $items = DB :: table('customer_reviews')
            ->select('customer_reviews.*','customers.customer_fname')
            ->join('customers','customer_reviews.customer_id','=','customers.id')
            ->latest()
            ->paginate(10);

        }
        else{
            $items = DB::table('customer_reviews')
            ->select('customer_reviews.*','customers.customer_fname')
            ->join('customers','customer_reviews.customer_id','=','customers.id')
            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
            // ->orwhere('customer_reviews.email','LIKE','%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        $this->fetchData();
        $this->pageAction();

        return view('livewire.customer-review-component',['items'=>$items])->layout('layouts.master');
    }
}
