<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Createuser extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.createuser');
    }
    public function increment(){
        $this->count++;
    }

    
}
