<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[title("vendor dashboard ")]
// #[layout("layouts.vendor.app")]
class Dashboard extends Component
{
    public function render()
    {
        // return view('livewire.vendor.dashboard')->extends("layouts.vendor.app")->section("content");
        return view('livewire.vendor.dashboard')->section("content")->extends("layouts.vendor.app");
    }
}
