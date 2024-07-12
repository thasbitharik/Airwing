<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Direction extends Component
{
    public function render()
    {
        return view('livewire.direction')->layout('layouts.front');
    }
}
