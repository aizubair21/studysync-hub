<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Livewire\Attributes\Title;

#[title("vendor dashboard ")]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.vendor.dashboard')->extends("layouts.vendor.app")->section("content");
    }
}
