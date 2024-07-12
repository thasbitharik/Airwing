<?php

namespace App\Http\Livewire;

use App\Models\CustomerComplain;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;

use Livewire\WithPagination;


class Complain extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action = [];

    //public variables basic
    public $item_customer = [];
    public $view = [];

    public $searchKey;
    public $key = 0;
    public $message = '';

    public $complain = "";
    public $title = "";
    public $name = "";
    public $email = "";
    public $status;
    public $seenby;

    public $review_id;

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
        $data=CustomerComplain::find($this->selected_id);
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
        // if($this->key == 0){
        //     $data = new CustomerComplain();
        //     $data -> staff_description =$this->staffdescription;

        //     $data ->save();
        //     session()->flash('message','Save Successfully');

        //     $this -> clearData();
        //     $this->dispatchBrowserEvent('insert-hide-form');
        // }
        // else{
            $data = CustomerComplain::find($this->review_id);
            $data -> seen_by =$this->seenby;

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
        $data = CustomerComplain::find($id);
        $this->seenby=$data->seen_by;
        $this->key = $id;
        $this->review_id =$id;
    }

    public function clearData()
    {
        $this->key =0;
        $this->seenby="";
    }

    public function FetchData()
    {
        
    }

    public $view_id = 0;
   public function openViewModel($id)
   {
    # code...
    $this->view = CustomerComplain::select('customer_complains.*')
        ->where('customer_complains.id','=',$id)
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
        if(!$this->searchKey){
            $items = DB :: table('customer_complains')
            ->select('customer_complains.*')
            ->latest()
            ->paginate(10);

        }
        else{
            $items = DB::table('customer_complains')
            ->select('customer_complains.*')
            ->where('customer_complains.name','LIKE','%'.$this->searchKey.'%')
            ->orwhere('customer_complains.email','LIKE','%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        $this->fetchData();
        $this->pageAction();
        return view('livewire.complain',['items'=>$items])->layout('layouts.master');
    }
}
