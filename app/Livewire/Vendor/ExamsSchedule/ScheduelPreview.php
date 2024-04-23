<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use App\Models\group_has_exam;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

#[title("Vendor | Exam schedule | preview")]
class ScheduelPreview extends Component
{
    /**
     * public property to store the data, that comes via url
     */

    /**
     * public property tostore components data
     */
    public $schedule = [];


    /**
     * listeners
     */
    protected $listeners = ["refresh" => '$refresh'];


    public function render()
    {
        return view('livewire.vendor.exams-schedule.scheduel-preview')->extends("layouts.vendor.app")->section("content");;
    }

    /**
     * mount method to get relative data from models 
     */
    public function mount()
    {
        // dd(request()->pid);
        $this->schedule = group_has_exam::where(["id" => request()->pid, "vendor" => Auth::id()])->first();
        // visit specific route  if there is no data in databas
    }


    public function try()
    {
        // do post route 
        // return redirect()->route('group.show', ['g' => $this->schedule['group']]);
        // return redirect("/dashboard/group-has-exams");

    }
}
