<?php

namespace App\Livewire\Member\Exams;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;

#[layout('layouts.member.app')]
class Index extends Component
{
    #[URL]
    public $tab = 'today';
    public function render()
    {
        return view('livewire.member.exams.index');
    }
}
