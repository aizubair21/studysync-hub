<?php

namespace App\Livewire\Member\Live;

use Livewire\Component;
use Livewire\Attributes\Title;

// #[layout('layouts.member.app')]
#[title('Live exam')]
class LiveExamIndex extends Component
{
    public function render()
    {
        return view('livewire.member.live.live-exam-index')->extends("layouts.member.app");
    }
}
