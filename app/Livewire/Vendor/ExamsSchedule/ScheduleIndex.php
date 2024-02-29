<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;


#[title(" | Exam schedule")]
class ScheduleIndex extends Component
{
    public $exams, $action = [];

    //listend the refresh event and refresh the components states
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.vendor.exams-schedule.schedulendex')->extends("layouts.app")->section("content");
    }

    public function getData()
    {
        // $this->exams
    }
    public function check()
    {
        dd($this->d);
    }
}
