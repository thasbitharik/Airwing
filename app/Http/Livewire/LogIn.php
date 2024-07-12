<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LogIn extends Component
{
    
    public function render()
    {
        return view('livewire.log-in')->layout('layouts.front');
    }
}
