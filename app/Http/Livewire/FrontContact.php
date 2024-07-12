<?php

namespace App\Http\Livewire;

use App\Models\CustomerComplain;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class FrontContact extends Component
{
    public $new_name;
    public $new_email;
    public $new_title;
    public $new_complain;

    public function saveData()
    {
        $this->validate(
            [
                'new_name' => 'required',
                'new_email' => 'required|email',
                'new_title' => 'required|max:255',
                'new_complain' => 'required|max:255'
            ]
        );

        $data = new CustomerComplain;
        $data->name = $this-> new_name;
        $data->email = $this-> new_email;
        $data->title = $this-> new_title;
        $data->complain = $this-> new_complain;
        $data->save();

        //show success message
        session()->flash('message', 'Send Successfully!');

        $this->clearData();

    }

    public function clearData()
    {
        $this->new_name="";
        $this->new_email="";
        $this->new_title="";
        $this->new_complain="";
    }

    public function render()
    {
        return view('livewire.front-contact')->layout('layouts.front');
    }
}
