<?php

namespace App\Livewire;

use Livewire\Component;

class Count extends Component
{

    public $counter = 2;

    public function add()
    {
        $this->counter++;
    }
    public function minus()
    {
        $this->counter--;
    }

    public function render()
    {
        return view('livewire.count');
    }
}
