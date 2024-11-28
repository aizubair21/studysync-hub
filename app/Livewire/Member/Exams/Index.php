<?php

namespace App\Livewire\Member\Exams;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.member.exams.index')->extends("layouts.member.app")->section('content');
    }
}
