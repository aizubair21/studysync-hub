<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\URL;
use App\Models\group_has_exam;
use App\Models\exam_has_question;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Exams\QuestionController;
use App\Models\question_has_option;

class ScheduleQuestions extends Component
{
    /**
     * url property
     */
    #[url]
    public $id;
    public $exams, $schedule, $questions, $optionArray = ["options", "options", "option", "option"];

    /**
     * client side data
     */
    public $CS;
    public $question, $options = [], $correct  = [], $q_type = 'textOnly', $a_type = 'multipleChoise', $status = 1, $file, $tags, $info, $isInfoTagShow;


    /**
     * modal
     */
    public $confirmQuickAddQuestion;

    // mount 
    public function mount($eid)
    {
        $this->id = decrypt($eid);
        $this->exams = auth()->user()->schedules()->find($this->id);
        // $this->schedule = group_has_exam::where(["id" => $this->id, "vendor" => Auth::id()])->first();
        $this->getSchedule();
        $this->getQuestions();
    }


    public function updated($property)
    {
        // dd($this->schedule);
        $this->exams->update(['exm_name' => $this->schedule['exm_name']]);
    }


    /**
     * add question box
     */
    public function addQuestion()
    {
        $questionData  = array(
            "question" => $this->question,
            "vendor" => Auth::id(),
            "exam_id" => $this->id,
            "type" => $this->q_type,
            "answer_type" => $this->a_type,
            "has_option" => count($this->options),
            "status" => $this->status,
        );
        // $this->exams->questions()->create($questionData);
        $questionId = exam_has_question::insertGetId($questionData);

        foreach ($this->options as $key => $value) {
            $is_correct = 0;
            if ($key == $this->correct[0]) { //correct [ 0 => 1/2/3]
                $is_correct = 1; //if index of loop and the value of 0 index of correct array is same, make the value of is_correct variable to 1, else 0.
            } else {
                $is_correct = 0;
            }

            // array_push($returnStr, "option is " .  $value  . " . is correct " . $is_correct);

            question_has_option::create(
                [
                    'question' => $questionId,
                    'option' => $value,
                    'is_correct' => $is_correct, // 0, 1 based on the condition above
                    'type' => 'text'
                ]
            );
        }

        // $collectionData = array("questionData" => $questionData, "options" => $this->options, "correct" => $this->correct);

        // if (QuestionController::save($collectionData) == "ok") {
        //     // $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
        //     $this->reset(["question", "options", "correct", "q_type", "a_type"]);
        //     $this->dispatch("notifySuccess", message: "Question inserted");
        // } else {
        //     $this->dispatch("notifyError", message: "Something went wrong!");
        //     dd(QuestionController::save($collectionData));
        // }
    }



    public function render()
    {
        return view('livewire.vendor.exams-schedule.schedule-questions')->extends('layouts.vendor.app');
    }

    public function getSchedule()
    {
        $this->schedule = $this->exams->toArray();
    }
    public function getQuestions()
    {
        $this->questions = $this->exams->questions()->with("options")->get()->toArray();
    }
}
