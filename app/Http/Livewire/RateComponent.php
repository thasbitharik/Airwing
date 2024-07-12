<?php

namespace App\Http\Livewire;

use App\Models\Rate;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

use Route;

use Livewire\WithPagination;

class RateComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $page_action=[];

    public $searchKey;
    public $key = 0;
    public $message = "";

    public $no_of_days="";
    public $amount="";

    //open model view
    public function openViewModel($id)
    {
        $this->view = Rate::select('rates.*')
        ->where('rates.id','=',$id)
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
            $bloadgr = Rate::find($this->delete_id);
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

    public function FetchData()
   {
       # code...
         
   }
   public function saveData()
    {
        if ($this->key == 0) {
        
        $this->validate(
            [
                'no_of_days'=>'required',
                'amount'=>'required',
            ]
            );
            $data = new Rate();
            $data->number_of_days = $this->no_of_days;
            $data->amount = $this->amount;
            $data->save();

            session()->flash('message','Save Successfully');

            $this -> clearData();
            $this->dispatchBrowserEvent('insert-hide-form');
        }
        else{

            $data = Rate::find($this->rate_id);
            $data->number_of_days = $this->no_of_days;
            $data->amount = $this->amount;
            $data->save();

            session()->flash('message','Update Successfully');

            $this -> clearData();
            $this->dispatchBrowserEvent('insert-hide-form');
        }
    }

    public function updateRecord($id)
    {
        $this->openModel();
        $data = Rate::find($id);
        $this->no_of_days = $data->number_of_days;
        $this->amount = $data->amount;
        $this->key = $id;
        $this->rate_id = $id;
    }

    public function clearData()
    {
        $this->key =0;
        $this->no_of_days="";
        $this->amount="";

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

    public function render()
    {
        $this->fetchData();
        $this->pageAction();

        if(!$this->searchKey){
            $items = DB :: table('rates')
            ->select('rates.*')
            ->latest()
            ->paginate(10);

        }
        else{
            $items = DB::table('rates')
            ->select('rates.*')
            ->where('rates.number_of_days','LIKE','%'.$this->searchKey.'%')
            ->orWhere('rates.amount','LIKE','%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        return view('livewire.rate-component',['items'=>$items])->layout('layouts.master');
    }
}
