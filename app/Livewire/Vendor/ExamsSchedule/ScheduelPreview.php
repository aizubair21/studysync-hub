<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use App\Models\group_has_exam;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Atributes\Reactive;

#[title("Vendor | Exam schedule | preview")]
class ScheduelPreview extends Component
{
    /**
     * public property to store the data, that comes via url
     */

    /**
     * public property tostore components data
     */
    #[reactive]
    public $schedule, $serverData;
    public $update = 0;

    /**
     * 
     */
    public $status;

    /**
     * listeners
     */
    protected $listeners = ["refresh" => '$refresh'];


    public function render()
    {
        return view('livewire.vendor.exams-schedule.scheduel-preview')->extends("layouts.vendor.app")->section("content");
    }

    /**
     * mount method to get relative data from models 
     */
    public function mount()
    {
        // dd(request()->pid);
        // $this->serverData = group_has_exam::where(["id" => request()->pid, "vendor" => Auth::id()])->first();
        $this->serverData = auth()->user()->schedules()->find(request()->pid);
        $this->schedule = $this->serverData->toArray();
        // dd(group_has_exam::where(["id" => request()->pid, "vendor" => Auth::id()])->first()->toArray());
        // dd($this->schedule);
        // visit specific route  if there is no data in databas
    }

    /**
     * 
     */
    public function updated($property)
    {
        $this->update = $this->update + 1;
        // group_has_exam::where('id', request()->pid)->update($this->schedule);
        // dd($this->schedule);
        $this->update();
    
    }

        
    public function update() 
    {
        $this->serverData->update($this->schedule);

    }

    public function try()
    {
        // do post route 
        // return redirect()->route('group.show', ['g' => $this->schedule['group']]);
        // return redirect("/dashboard/group-has-exams");

    }
}
