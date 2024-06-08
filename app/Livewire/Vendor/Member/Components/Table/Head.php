<?php

namespace App\Livewire\Vendor\Member\Components\Table;

use Livewire\Component;

class Head extends Component
{
    public $header = [];
    public function render()
    {
        return view('livewire.vendor.member.components.table.head');
    }
}
