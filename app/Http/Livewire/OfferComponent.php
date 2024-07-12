<?php

namespace App\Http\Livewire;

use App\Models\Offer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Route;
use Livewire\WithPagination;

class OfferComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $page_action=[];

    public $searchKey;
    public $key = 0;
    public $message = "";

    public $title="";
    public $promo_code="";
    public $dis_per="";
    public $status;

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
        $data=Offer::find($this->selected_id);
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

    //open model view
    public function openViewModel($id)
    {
        $this->view = Offer::select('offers.*')
        ->where('offers.id','=',$id)
        ->get();
        $this->dispatchBrowserEvent('view-show-form');

    }
    //close model view
    public function viewCloseModel()
    {
        $this->dispatchBrowserEvent('view-hide-form');

        $this->view = [];
    }  
    
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

    //open model delete
    public $delete_id = 0;
    public function deleteOpenModel($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-show-form');
    }

    #delete Data
    public function deleteRecord()
    {
        # code...
        if ($this->delete_id != 0) {
            $bloadgr = Offer::find($this->delete_id);
            $bloadgr->delete();
            $this->deleteCloseModel();

            //show Delete message
            session()->flash('del_message', ' Record Deleted!');
        }
    }

    //close model close
    public function deleteCloseModel()
    {
        $this->dispatchBrowserEvent('delete-hide-form');
    }


    public function saveData()
    {
        if ($this->key == 0) {
        
        $this->validate(
            [
                'title'=>'required',
                'promo_code'=>'required',
                'dis_per'=>'required',
            ]
            );
            $data = new Offer();
            $data->title = $this->title;
            $data->promo_code = $this->promo_code;
            $data->dis_per = $this->dis_per;
            $data->save();

            session()->flash('message','Save Successfully');

            $this -> clearData();
            $this->dispatchBrowserEvent('insert-hide-form');
        }
        else{

            $data = Offer::find($this->offer_id);
            $data->title = $this->title;
            $data->promo_code = $this->promo_code;
            $data->dis_per = $this->dis_per;
            $data->save();

            session()->flash('message','Update Successfully');

            $this -> clearData();
            $this->dispatchBrowserEvent('insert-hide-form');
        }
    }

    public function updateRecord($id)
    {
        $this->openModel();
        $data = Offer::find($id);
        $this->title = $data->title;
        $this->promo_code = $data->promo_code;
        $this->dis_per = $data->dis_per;
        $this->key = $id;
        $this->offer_id = $id;
    }

    public function clearData()
    {
        $this->key =0;
        $this->title="";
        $this->promo_code="";
        $this->dis_per="";

    }
     #comon controls
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
        $this->fetchData();
        $this->pageAction();

        if(!$this->searchKey){
            $items = DB :: table('offers')
            ->select('offers.*')
            ->latest()
            ->paginate(10);

        }
        else{
            $items = DB::table('offers')
            ->select('offers.*')
            ->where('offers.title','LIKE','%'.$this->searchKey.'%')
            ->orwhere('offers.promo_code','LIKE','%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        return view('livewire.offer-component',['items'=>$items])->layout('layouts.master');
    }
}
