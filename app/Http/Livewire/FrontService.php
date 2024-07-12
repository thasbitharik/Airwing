<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FrontService extends Component
{
    public function render()
    {
        return view('livewire.front-service')->layout('layouts.front');
    }
}
