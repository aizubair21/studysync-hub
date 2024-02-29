<?php

namespace App\Livewire\Vendor\Group;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Groups | Add new group')]
class Groupcreate extends Component
{
    public function render()
    {
        return view('livewire.vendor.group.groupcreate')->extends("layouts.vendor.app")->section('content');
    }
}
