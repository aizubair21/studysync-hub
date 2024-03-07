<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
// use Livewire\Attributes\Computed;
use App\Models\{Exam, Group, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

#[title(" | Exam schedule create")]
class ScheduleForm extends Component
{
    #[validate("required")]
    public $exm_type, $exm_name, $exm_subject, $g_id, $exm_date, $exm_start, $exm_duration, $for_cr, $for_wr, $for_skp;

    public $group = [];

    public function render()
    {
        $this->exm_date = today();
        $this->exm_start  = now()->addHour();
        $this->exm_duration = "30";
        return view('livewire.vendor.exams-schedule.schedule-form')->extends("layouts.vendor.app")->section("content");;
    }


    public function submitScheduleForm()
    {
        $validatedData = $this->validate();
        $intrance_id = uniqid("exm-");
        $m_id = Auth::id();
        array_push($validatedData, $intrance_id, $m_id);
        // Create new exam model and assign the values from validated data.
        # [Note]: We are using `Str::random()` to generate a random string for `exam intrance id`field.
        $newExam = Exam::create();

        // dd($intrance_id);
        dd($this->all());
    }

    //reseting function
    public function re_set()
    {
        $this->reset("exm_type", "exm_name", "exm_subject", "g_id", "exm_date", "exm_start", "exm_duration", "for_cr", "for_wr", "for_skp");
    }

    // add group 
    public function addGroup()
    {
        $this->group[] = "General";
    }
}
