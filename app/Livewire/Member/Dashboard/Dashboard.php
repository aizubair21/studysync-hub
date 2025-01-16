<?php

namespace App\Livewire\Member\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

#[layout('layouts.member.app')]
#[title("Students Board")]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.member.dashboard.dashboard');
    }


    public function mount(Request $request) {}



    public function checkRequest(Request $request)
    {
        if ($request->user() == Auth::user()) {
            return "auth user identified";
        } else {
            return "Auth not identified";
        }
    }
}
