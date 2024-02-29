<?php

namespace App\Livewire\Vendor\Supervisor;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Supervisor | Add New')]
class SupervisorCreateForm extends Component
{
    public function render()
    {
        return view('livewire.vendor.supervisor.supervisor-create-form')->extends("layouts.vendor.app")->section('content');
    }
}
