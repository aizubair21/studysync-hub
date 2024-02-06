<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;


#[title("Administrator Dashboard | Exam schedule > All")]
class ScheduleIndex extends Component
{
    public $exams, $d = [];
    public function render()
    {
        return view('livewire.vendor.exams-schedule.schedulendex')->extends("auth.teacher.app")->section("content");
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
