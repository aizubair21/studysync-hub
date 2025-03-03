<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use App\Models\group_has_exam;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;


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
     * refresh listeners
     */
    protected $listeners = ['refresh' => '$refresh'];


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

    public function computed()
    {
        $this->groups = auth()->user()->vendorGroups->get('id', 'name');
    }

    /**
     * add question to a targeted schedules
     */
    public function addQuestion($eid)
    {
        $examSchedules = $this->schedules->find($eid);

        DB::transaction(function () use ($examSchedules) {

            $questionData  = array(
                "question" => 'Untitled Question',
                "vendor" => Auth::id(),
                "exam_id" => $examSchedules->id,
                "group_id" => $examSchedules->group['id'],
                "type" => 'textOnly',
                "answer_type" => 'Multiple',
                "has_option" => 0,
                "status" => '1',
            );
            exam_has_question::create($questionData);
            // $this->questions = array_merge($this->questions, $getQuestions);
        });

        $this->getRelatedQuestions();
        $this->dispatch('question-added'); // Add this line to emit event
        // push the new question to the questions array
        $this->dispatch('refresh');
    }

    /**
     * get related question
     * based on filter
     */
    public function getRelatedQuestions()
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

        $this->questions = $questions->orderBy('id', 'desc')->get('id');
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.vendor.questions.index', ["qs" => $this->questions])->extends("layouts.vendor.app");
    }
}
