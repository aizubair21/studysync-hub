<?php

namespace App\Livewire\Vendor\Member\Components\Table;

use Livewire\Component;

class Body extends Component
{
    public $data;
    public function render()
    {
        return view('livewire.vendor.member.components.table.body');
    }
}
