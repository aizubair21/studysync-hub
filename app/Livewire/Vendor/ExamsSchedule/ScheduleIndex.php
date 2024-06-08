<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use App\Http\Controllers\Exams\QuestionController;
use App\Models\exam_has_question;
use App\Models\group_has_exam as exams;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

use function Livewire\store;

#[title(" | Exam schedule")]
class ScheduleIndex extends Component
{
    /**
     * public property to store component's data
     */
    public $exams, $groups, $member, $optionArray = ["options", "options", "option", "option"], $viewExamQuestionData = [], $moreInfoData = [];

    /**
     * public property to store client side data
     */
    public  $selectedId = [], $question, $options = [], $correct  = [], $q_type, $selectedExamToAddQuestion, $a_type;

    /**
     * public property to store filter data
     */
    public $status, $subject, $time;

    /**
     * property to toggle the modal
     */
    public $confirmQuickAddQuestion, $isShowSelectExamModal, $isShowQuestionViewModal, $confrmInfoModal;

    //listend the refresh event and refresh the components states
    protected $listeners = ['refresh' => '$refresh'];


    public function render()
    {
        // public_path();
        return view('livewire.vendor.exams-schedule.schedulendex')->extends("layouts.vendor.app")->section("content");
    }


    //get all required data
    public function mount()
    {
        // $this->exams = DB::table("exams")->where("m_id", Auth::id())->get();
        $this->groups = Auth::user()->vendorGroups;
        $this->exams = Auth::user()->schedules;
        // $this->member = Auth::user()->studetns;
        $this->member = User::where("vendor", Auth::id())->orderBy("id", "desc")->get();
        // $this->groups = Group::where("vendor", Auth::id())->get();
        // dd($this->exams);
    }


    // watch method that always check any update happend in property 
    // if yes then call the showModal method
    // public function updatedConfirmQuickAddQuestion()
    public function confirmSelectedExamToQuickAddQuestion()
    {
        if (isset($this->selectedExamToAddQuestion)) {
            $this->isShowSelectExamModal = !$this->isShowSelectExamModal;
            $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
        }
    }

    public function shoArray()
    {
        // $this->selectedId = $this->selectedId;;
        // dd($this->selectedId);
    }

    /**
     * destroy a group exam schedule 
     * @param selected id of exams schedule
     */
    public function destroy(array $selectedId)
    {
        foreach ($selectedId as $key => $value) {
            exams::find($value)->delete();
            $this->dispatch("notifySuccess", message: "A Group exam schedule has been deleted successfully!");
            $this->dispatch("refresh");
            $this->resetActionArray();
        }
    }

    //destroy 
    public function draft($selectedId)
    {
        foreach ($selectedId as $key => $value) {
            exams::find($value)->update(["status" => "0"]);
            $this->dispatch("notifyInfo", message: "Exam Schedule now in draft!");
            $this->dispatch("refresh");
            $this->resetActionArray();
        }
    }

    //do publish
    public function doPublishedExam($selectedId)
    {
        foreach ($selectedId as $key => $value) {
            // $this->exams->where("id", $value)->update(["status" => "2"]);
            exams::find($value)->update(["status" => "1"]);
            $this->dispatch("notifySuccess", message: "A Group exam schedule has been published. !");
            $this->dispatch("refresh");
            $this->resetActionArray();
        }
    }

    //do live
    public function doLiveExam($selectedId)
    {
        foreach ($selectedId as $key => $value) {
            // $this->exams->where("id", $value)->update(["status" => "2"]);
            exams::find($value)->update(["status" => "2"]);
            $this->dispatch("notifySuccess", message: "A Group exam schedule is LIVE now !");
            $this->dispatch("refresh");
            $this->resetActionArray();
        }
    }


    //reset the action array after performing actions
    public function  resetActionArray()
    {
        $this->selectedId = [];
    }


    /**
     * add question modal show on the basis
     */
    public function addQuestionModal($selectedId)
    {
        // $this->dispatch("notifyInfo", message: "Please select Just One  Exam to Add Questions.");

        // $this->redirectIntended(, true);

        if (empty(count($selectedId))) {
            $this->isShowSelectExamModal = !$this->isShowSelectExamModal;
            # code...
        } elseif (count($selectedId) > 1) {
            # code...
            $this->dispatch("notifyInfo", message: "Please select Just One  Exam  or Unselect all.");
            $this->isShowSelectExamModal = !$this->isShowSelectExamModal;
            // $this->isShowSelectExamModal = false;
        } else {
            // $this->toggle("confirmQuickAddQuestion");
            $this->selectedExamToAddQuestion  = $selectedId[0];
            $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
        }
    }

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

        $this->validate([
            "question" => "required",
            'options' => 'required',
            'correct' => "required",
            'q_type' => "required",
            'a_type' => "required"
        ], [
            "question.required" => "The question field cannot be empty.",
            "options.*.required" => "At least one option should not be empty.",
            "correct.*.required" => "Correct answer must be selected for all options.",
            "options.required" => "At least one option should not be empty.",
            "correct.required" => "Correct answer must be selected for all options.",
            "q_type.required" => "Select the type of question.",
            "a_type.required" => "Select the type of answer."
        ]);

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
        );

        $collectionData = array("questionData" => $questionData, "options" => $this->options, "correct" => $this->correct);
        // dd(QuestionController::store($collectionData));
        if (QuestionController::store($collectionData) == "ok") {
            $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
            $this->reset(["question", "options", "correct", "selectedExamToAddQuestion", "q_type", "a_type"]);
            $this->dispatch("notifySuccess", message: "Question inserted");
        } else {
            $this->dispatch("notifyError", message: "Something went wrong!");
            dd(QuestionController::store($collectionData));
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


    //view quesiton modal
    public function showQuestionViewModal($pid)
    {
        // dd($pid);
        // $viewExamQuestionData =   
        // dd($viewExamQuestionData);
        if (isset($pid)) {
            $this->isShowQuestionViewModal = !$this->isShowQuestionViewModal;
            $this->viewExamQuestionData = exam_has_question::where(['exam_id' => $pid])->with("options")->get();
        } else {
            $this->viewExamQuestionData = [];
        }
    }


    /**
     * show more information
     */
    public function showMoreInfo($pid)
    {
        # code...
        $this->confrmInfoModal = !$this->confrmInfoModal;
        $this->moreInfoData = exams::where(["id" => $pid, "vendor" => Auth::id()])->first();
    }
}
