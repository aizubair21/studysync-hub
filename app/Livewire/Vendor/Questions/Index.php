<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;

class Index extends Component
{

    /**
     * URL paramiter
     */
    #[URL]
    public $for;

    /**
     * components data
     */

    public  $groups, $questions;


    /**
     * mount function
     */
    public function mount()
    {

        $this->questions = exam_has_question::where(["vendor" => Auth::id()])->get();

        $this->groups = auth()->user()->vendorGroups;
    }


    public function updated($property)
    {
        if ($property = $this->for) {
            if ($this->for == "*") {
                $this->questions = exam_has_question::where(["vendor" => Auth::id()])->get();
            } else {
                $schedules = auth()->user()->vendorGroups()->find(decrypt($this->for))->schedules; //collection
                $this->questions = $schedules->pluck('questions')->flatten();
            }
        }
        // dd($this->questions);
    }

    public function computed()
    {
        $this->groups = auth()->user()->vendorGroups;
    }

    public function render()
    {
        return view('livewire.vendor.questions.index')->extends("layouts.vendor.app");
    }
}
