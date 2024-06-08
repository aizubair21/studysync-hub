<?php

namespace App\Livewire\Member\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[layout('layouts.member.app')]
#[title("Students Board")]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.member.dashboard.dashboard');
    }
}
