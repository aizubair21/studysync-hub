<?php

namespace App\Livewire\Vendor\Questions;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;


class Create extends Component
{
    /**
     * url property
     */
    #[url]
    public $sid;

    public function render()
    {
        return view('livewire.vendor.questions.create')->extends("layouts.vendor.app");
    }
}
