<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use App\Models\group_has_exam;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;
    /**
     * URL paramiter
     */
    #[URL]
    public $for = '0', $schedule = '0';

    /**
     * components data
     */

    public  $groups, $questions, $schedules;

    /**
     * mount function
     */
    public function mount()
    {

        $this->schedules = auth()->user()->schedules;
        $this->groups = auth()->user()->vendorGroups;

        // $this->questions = exam_has_question::where(["vendor" => Auth::id()])->get();
        $this->getRelatedQuestions();
    }


    public function updated($property)
    {

        $this->getRelatedQuestions($property);


        /**
         * change schedule related with group
         */



        if ($this->for > 0) {
            $schedules = group_has_exam::where(['group' => $this->for, 'vendor' => Auth::id()]);
            $this->schedules = $schedules->get();
            // $this->schedule = "*";
            // $groups = auth()->user()->vendorGroups->where('id', $this->for);
            /**
             * if group have, then get the question related group
             */
            // $this->questions = $schedules->count() > 0 ? exam_has_question::where(["vendor" => Auth::id(), 'exam_id' => $this->schedule])->get() : [];
        } else {
            // $this->dispatch('refresh');
            // $this->questions = [];
        }


        // dd($this->questions);
    }

    private function getRelatedQuestions()
    {
        $questions = exam_has_question::query()->where(["vendor" => Auth::id()]);
        // whereIn('exam_id', $this->schedules->pluck('id'))->get();

        if ($this->schedule > 0) {
            $this->questions = $questions->where('exam_id', $this->schedule);
        } else {
            $this->questions = $questions;
        }

        if ($this->for > 0) {
            $this->questions = $questions->where('group_id', $this->for);
        } else {
            $this->questions = $questions;
        }

        $this->questions = $questions->orderBy('id', 'desc')->get();

        // if ($this->schedule > 0) {
        //     // have a exam schedule id 
        //     /**schedule
        //      * have a schedule id
        //      * then get the question related schedule
        //      */
        //     // $this->schedules = auth()->user()->schedules;
        //     $this->questions = exam_has_question::where(["vendor" => Auth::id(), 'exam_id' => $this->schedule])->get();
        // } else {

        //     if ($this->for > 0) {
        //         /**
        //          * have an group id, but exam not defined
        //          */
        //         // $schedules = group_has_exam::where(['id' => $this->for, 'vendor' => Auth::id()]);
        //         // $this->questions = $schedules->count() > 0 ? exam_has_question::where(["vendor" => Auth::id(), 'exam_id' => $this->schedule])->get() : [];
        //     } else {
        //         // no group id, no exam id
        //         // $this->questions = [];
        //         $this->questions = exam_has_question::where(["vendor" => Auth::id()])->limit(50)->get();
        //     }
        //     $this->questions = exam_has_question::where(["vendor" => Auth::id()])->limit(50)->get();
        //     // dd($this->questions);
        // }
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
