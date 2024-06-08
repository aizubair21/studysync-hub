<?php

namespace App\Livewire\Vendor\Member\Components\Table;

use Livewire\Component;

class Table extends Component
{
    public $header;
    public $members;
    public $actionArray = [];

    public function render()
    {
        return view('livewire.vendor.member.components.table.table');
    }


    public function updated()
    {
        $this->dispatch('showTableAction',  $this->actionArray);
    }
}
