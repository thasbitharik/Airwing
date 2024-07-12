<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer as CustomerModel;
use Illuminate\Support\Facades\DB;
use Route;

use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action =[];

    public $searchKey;
    public $key = 0;
    public $message = "";

    // public $fname;
    // public $sname;
    // public $contact;
    // public $email;
    // public $address;
    // public $street;
    // public $city;
    // public $postalcode;
    // public $password;

    // public $customer_id="";

    //open model insert
    public function openModel()
    {
        $this->clearData();
        $this->dispatchBrowserEvent('insert-show-form');
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
            $sample_data = CustomerModel::find($this->delete_id);
            $sample_data->delete();
            $this->deleteCloseModel();

            //show Delete message
            session()->flash('del_message', 'Record Deleted!');
        }
    }

    //close model close
    public function deleteCloseModel()
    {
        $this->dispatchBrowserEvent('delete-hide-form');
    }

    public function fetchData()
    {
        # code...
    }

    // public function saveData()
    // {
        # code...
        // if($this->key == 0){
        //     $this->validate(
        //         [
        //             'fname' => 'required',
        //             'sname' => 'required',
        //             'contact' => 'required',
        //             'contact' => 'required',
        //             'email' => 'required|unique:customers',
        //             'address' => 'required',
        //             'street' => 'required',
        //             'city' => 'required',
        //             'postalcode' => 'required',

        //         ]
        //         );

            // $data = new CustomerModel();
            // $data ->customer_fname = $this->fname;
            // $data ->customer_sname = $this->sname;
            // $data ->customer_tp = $this->contact;
            // $data ->customer_email = $this->email;
            // $data ->address = $this->address;
            // $data ->street = $this->street;
            // $data ->city = $this->city;
            // $data ->postal_code = $this->postalcode;
            // $data ->save();

            // session()->flash('message', 'Saved Successfully!');
        
            // $this->dispatchBrowserEvent('insert-hide-form');

        // }
    // }
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
        $this->FetchData();

        $this->pageAction();

        if(!$this->searchKey){
            $items= DB :: table('customers')
            ->select('customers.*')
            ->latest()
            ->paginate(10);
        }
        else{
            $items= DB::table('customers')
            ->select('customers.*')
            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
            ->orWhere('customers.customer_email','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.customer_tp','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.address','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.customer_sname','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);        
        }

        return view('livewire.customer',['items'=>$items])->layout('layouts.master');
    }
}
