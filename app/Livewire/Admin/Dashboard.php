<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;

#[title("administrator dashboard")]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')->extends("layouts.administrator.app")->section("content");
    }
}
