<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use App\Models\group_has_exam;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use App\Http\Controllers\Exams\QuestionController;
use Livewire\WithFileUploads;

#[title("Question Index")]
class Create extends Component
{

    use WithFileUploads;

    /**
     * public property to store component's data
     */
    // public $schedule, $optionArray = ["options", "options", "option", "option"];
    public $schedule;

    /**
     * public property to store client side data
     */
    public $question, $options = [], $correct  = [], $q_type = 'textOnly', $selectedExamToAddQuestion, $a_type = 'multipleChoise', $status = 1, $file, $tags, $info, $isInfoTagShow;

    /**
     * property to toggle the modal
     */
    public $isSelectModal, $isEditQuestionModel, $confirmQuickAddQuestion;

    //listend the refresh event and refresh the components states
    protected $listeners = ['refresh' => '$refresh'];

    // mount 
    public function mount($eid = null)
    {
        $this->selectedExamToAddQuestion = $eid ?? false;
        $this->isSelectModal = empty($eid)  ? true : false;
        // $this->exams = group_has_exam::where(["vendor" => Auth::id()])->get();
        $this->schedule = group_has_exam::with('questions')->where(["id" => $eid, "vendor" => Auth::id()])->first();
        // $this->questions = exam_has_question::where(['exam_id' => $this->eid])->with("options")->get();
    }

    public function render()
    {
        return view('livewire.vendor.questions.create')->extends("layouts.vendor.app");
    }


    public function makeEdit($id)
    {
        // authhorize the use to edit the questin /
        $this->isEditQuestionModel = true;
    }


    /**
     * add quick question
     */
    //add quick  question modal
    public function addQuestion()
    {
        // dd($this->question, $this->options, $this->correct);
        // dd(QuestionController::store(request()->all()));
        // validator::make(request()->all(), [
        //     "question" => "required",
        //     'options.*' => 'required',
        //     'correct.*' => "required"
        // ]);

        // $this->validate([
        //     "question" => "required",
        //     'options' => 'required',
        //     'correct' => "required",
        //     'q_type' => "required",
        //     'a_type' => "required"
        // ], [
        //     "question.required" => "The question field cannot be empty.",
        //     "options.*.required" => "At least one option should not be empty.",
        //     "correct.*.required" => "Correct answer must be selected for all options.",
        //     "options.required" => "At least one option should not be empty.",
        //     "correct.required" => "Correct answer must be selected for all options.",
        //     "q_type.required" => "Select the type of question.",
        //     "a_type.required" => "Select the type of answer."
        // ]);

        // $this->valid;
        // here options is an array of option  and correct is a string that contains the index number of the correct answer in the options array 
        // now wanna to validate  at lest one options must be filled out
        // if ($validator->fails()) {
        //     # code...
        //     if (count($this->options) == 0) {
        //         // return $this->addErrorToField("options.*", "At least one option field should not be empty.");
        //         $validator->errors()->add("options.*", "At least one option field should not be empty. via add");
        //         return;
        //     }
        // }


        $questionData = array(
            "question" => $this->question,
            "vendor" => Auth::id(),
            "exam_id" => $this->selectedExamToAddQuestion,
            "type" => $this->q_type,
            "answer_type" => $this->a_type,
            "has_option" => count($this->options),
            "status" => $this->status,
        );

        $collectionData = array("questionData" => $questionData, "options" => $this->options, "correct" => $this->correct);
        // dd(QuestionController::store($collectionData));
        // dd($collectionData);
        if (QuestionController::save($collectionData) == "ok") {
            // $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
            $this->reset(["question", "options", "correct", "selectedExamToAddQuestion", "q_type", "a_type"]);
            $this->dispatch("notifySuccess", message: "Question inserted");
        } else {
            $this->dispatch("notifyError", message: "Something went wrong!");
            dd(QuestionController::save($collectionData));
        }


        // dd($validator->errors());
        //custom make validation error message
        // $messages = [
        //     'options.*.required' => 'At least one option field must be filled out',
        // ];

        // QuestionController::store(request()->all());
        // $this->emit('showAlert');
        // $this->resetFields();
        // session()->flash("success","Question added successfully!");

    }
}
