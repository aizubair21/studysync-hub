<?php

namespace App\Livewire\Vendor\Group;


use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Groups | Update Group Info')]
class GroupUpdate extends Component
{
    public function render()
    {
        return view('livewire.vendor.group.group-update')->extends("layouts.vendor.app")->section('content');
    }
}
