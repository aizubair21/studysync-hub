<?php

namespace App\Livewire\Vendor\Supervisor;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Supervisor | View all')]
class SupervisorIndex extends Component
{
    public function render()
    {
        return view('livewire.vendor.supervisor.supervisor-index')->extends("layouts.vendor.app")->section('content');
    }
}
