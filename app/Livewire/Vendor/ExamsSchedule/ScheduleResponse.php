<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;

class ScheduleResponse extends Component
{

    /**
     * url param
     */
    #[URL]
    private $id;

    /**
     * public property that hold components data
     */
    public $serverData, $schedule;

    public function mount($pid)
    {
        $this->id = $pid;
        $this->getData();
    }


    public function getData()
    {
        $this->serverData = auth()->user()->schedules()->find($this->id);
        $this->schedule = $this->serverData->toArray();
    }


    public function render()
    {
        return view('livewire.vendor.exams-schedule.schedule-response')->extends("layouts.vendor.app");
    }
}
