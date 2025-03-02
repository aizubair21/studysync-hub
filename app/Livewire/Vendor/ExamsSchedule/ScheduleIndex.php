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
use Livewire\Attributes\Url;

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

    #[URL()]
    public $filters_by_group, $filter_by_status, $created, $search, $result_date, $exam_date, $exam_date_start, $exam_date_end, $result_date_start, $result_date_end;


    /**
     * public property to store filter data
     */
    public $status, $subject, $time;

    /**
     * property to toggle the modal
     */
    public $confirmQuickAddQuestion, $isShowSelectExamModal, $isShowQuestionViewModal, $confrmInfoModal, $isShowFilterModal;

    //listend the refresh event and refresh the components states
    protected $listeners = ['refresh' => '$refresh'];


    /**
     * render method
     */
    public function render()
    {
        // public_path();
        return view('livewire.vendor.exams-schedule.schedulendex')->extends("layouts.vendor.app")->section("content");
    }

    /**
     * update method
     */
    public function updated()
    {
        // dd($this->exam_date);
        $this->getExams();
    }

    //get all required data
    public function mount()
    {
        // $this->exams = DB::table("exams")->where("m_id", Auth::id())->get();
        $this->groups = Auth::user()->vendorGroups;
        // $this->exams = Auth::user()->schedules;
        $this->getExams();
        // $this->member = Auth::user()->studetns;
        $this->member = User::where("vendor", Auth::id())->latest()->get();
        // $this->groups = Group::where("vendor", Auth::id())->get();
        // dd($this->exams);
    }

    /**
     * method get all the exams
     * method check if there filter_by_group exists
     */
    public function getExams()
    {
        // dd($this->filters_by_group);
        $exams = exams::query()->where(['vendor' => Auth::id()])->orderBy('id', 'desc');

        if ($this->filters_by_group > 0) {
            $exams->where(['group' => $this->filters_by_group]);
        }

        /**
         * if filter_by_status found
         */
        if ($this->filter_by_status > 0) {
            $exams->where(['status' => $this->filter_by_status]);
        }

        /**
         * if created found
         * filter by created
         */
        switch ($this->created) {
            case 'Today':
                $exams->whereDate('created_at', now());
                break;
            case 'Tomorrow':
                $exams->whereDate('created_at', now()->addDay());
                break;

            case 'Yestarday':
                $exams->whereDate('created_at', now()->subDay());
                break;

            case 'Week':
                //takes the exam created in the last 7 days
                $exams->whereDate('created_at', '<=', now()->endOfWeek());
                break;

            case 'Monty':
                //takes the exam created in the last 30 days
                $exams->whereDate('created_at', '>=', now()->endOfMonth());
                break;

            default:
                $exams->whereDate('created_at', '<', now()->endOfMonth());
                break;
        }

        /**
         * has search
         */
        if ($this->search) {
            $exams->where('exm_name', 'like', '%' . $this->search . '% ');
        }


        /**
         * exam advanced filter
         * filter by result published date
         */
        if ($this->result_date) {
            switch ($this->result_date) {
                case 'Today':
                    $exams->whereDate('result_published_on', now());
                    break;

                case 'Tomorrow':
                    $exams->whereDate('result_published_on', now()->addDay());
                    break;

                case 'Weak':
                    $exams->whereBetween('result_published_on', [now(), now()->endOfWeek()]);
                    break;

                case 'Month':
                    $exams->whereBetween('result_published_on', [now(), now()->endOfMonth()]);
                    break;

                case 'Between':
                    $exams->whereBetween('result_published_on', [$this->result_date_start, $this->result_date_end]);
                    break;
                    
            }
        }


        /**
         * exam advanced filter
         * filter by exam date
         */
        if ($this->exam_date) {
            switch ($this->exam_date) {
                case 'Today':
                    $exams->whereDate('exm_date', now());
                    break;

                case 'Tomorrow':
                    $exams->whereDate('exm_date', now()->addDay());
                    break;

                case 'Weak':
                    $exams->whereBetween('exm_date', [today(), now()->endOfWeek()]);
                    break;

                case 'Month':
                    $exams->whereBetween('exm_date', [today(), now()->endOfMonth()]);
                    break;

                case 'Between':
                    $exams->whereBetween('exm_date', [$this->exam_date_start, $this->exam_date_end]);
                    break;
            }
        }


        $this->exams = $exams->get();
    }



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
            exams::find($value)->update(["status" => "2"]);
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
            exams::find($value)->update(["status" => "1"]);
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
            // $this->selectedExamToAddQuestion  = $selectedId[0];
            $se = exams::where(["id" => $selectedId[0], "vendor" => Auth::id()])->first();
            $this->redirectIntended(route("vendorExamSchedule.question", ["pid" => $se->id, "endpoint" => $se->attend_endpoint]), true);
            // $this->confirmQuickAddQuestion = !$this->confirmQuickAddQuestion;
        }
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
