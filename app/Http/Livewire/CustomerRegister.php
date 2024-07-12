<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;


class CustomerRegister extends Component
{
    public $message = '';

    public $new_customer_fname;
    public $new_customer_sname;
    public $new_customer_tp;
    public $new_customer_email;
    public $new_password;
    public $new_confirm_password;
    public $new_address;
    public $new_city;
    public $new_street;
    public $new_postal_code;

    #reload page
    public function reloadPage()
    {
        $this->dispatchBrowserEvent('reload-page');
    }

    public function viewCloseModel()
    {
        $this->dispatchBrowserEvent('view-hide-form');

        // $this->view = [];
    }
    public function saveData()
    {
        $this->validate([

            'new_customer_fname' =>'required',
            'new_customer_sname' => 'required',
            'new_customer_email' => 'required|email|regex:/(.*)\./i|unique:customers,customer_email',
            'new_customer_tp' =>'required|min:10|:customers,customer_tp',
            'new_password' => 'required|min:6',
            'new_confirm_password' => 'required_with:new_password|same:new_password|min:6',
            'new_address' => 'required',
            'new_street' => 'required',
            'new_city' => 'required',
            'new_postal_code' => 'required',

        ]);
        # code...
        $data = new Customer();
        $data -> customer_fname = $this->new_customer_fname;
        $data -> customer_sname = $this->new_customer_sname;
        $data -> customer_tp = $this->new_customer_tp;
        $data -> customer_email = $this->new_customer_email;
        $data -> password = Hash::make($this-> new_password);
        $data -> address = $this-> new_address;
        $data -> street = $this-> new_street;
        $data -> city = $this-> new_city;
        $data -> postal_code = $this-> new_postal_code;

        $data-> save();
        // session()->flash('message', 'Registered successfully!');

        // $this->dispatchBrowserEvent('insert-hide-form');

        $this->clearData();

        $this->dispatchBrowserEvent('RegisterdSuccessfully');
    }
    public function clearData()
    {
        # code...
        $this->new_customer_fname="";
        $this->new_customer_sname="";
        $this->new_customer_tp="";
        $this->new_customer_email="";
        $this->new_password="";
        $this->new_confirm_password ="";
        $this->new_address="";
        $this->new_street="";
        $this->new_city="";
        $this->new_postal_code="";


    }

    public function render()
    {
        return view('livewire.customer-register')->layout('layouts.front');
    }
}
