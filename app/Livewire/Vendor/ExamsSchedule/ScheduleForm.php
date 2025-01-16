<?php

namespace App\Livewire\Vendor\ExamsSchedule;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
// use Livewire\Attributes\Computed;
use App\Models\{group_has_exam, Group, User};
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

#[title(" | Exam schedule create")]
class ScheduleForm extends Component
{
    // #[validate("required")]
    // public $exm_type, $exm_type_of, $exm_name, $exm_subject, $group, $exm_date, $exm_start, $exm_duration, $for_cr, $for_wr, $for_skp, $pass_mark, $exm_end_at;
    // public $total_mark, $total_question, $exm_note, $is_retake, $exm_function, $exm_key_note;
    public $group;
    public $vendor;
    public $exm_type;
    public $exm_type_of;
    public $exm_function;
    public $exm_name;
    public $exm_subject;
    public $exm_key_note;
    public $is_retake;
    public $isLinkOpen = 0;
    public $link_open_at;
    public $link_close_at;
    public $can_attend_until;
    public $isResultPublished;
    public $result_published_on;
    public $exm_date;
    public $exm_duration;
    public $for_cr = 1;
    public $for_wr = .25;
    public $for_skp = 0;
    public $pass_mark = 000;
    public $status = 0;
    public $total_mark = 000;
    public $total_question = 000;
    public $Is_prevent_change_option = 1;
    public $ransomized_question = 1;
    public $mouse_track = 1;
    public $window_track = 1;
    public $have_moderate;
    public $have_moderable_question;
    public $is_moderated;
    public $attend_endpoint;
    public $exm_note;
    public $exm_end_at;
    public $exm_start;
    public $is_published = 0;

    public $groups, $showInstantGroupInput = false, $instantGroupName;
    protected $listeners = ['refresh' => '$refresh', 'updatedExmTypeOf'];
    // protected $listeners = ['updatedExmTypeOf'];

    // validation rules
    protected $rules = [
        'group' => 'required|string|max:255',
        'exm_type' => 'required|string|max:255',
        'exm_type_of' => 'required|string|max:255',
        'exm_name' => 'required|string|max:255',
        'exm_subject' => 'required|string|max:255',
        'exm_key_note' => 'nullable|string',
        'exm_note' => 'nullable',
        'is_retake' => 'nullable|boolean',
        'isLinkOpen' => 'nullable|boolean',
        'link_open_at' => 'nullable',
        'link_close_at' => 'nullable|date',
        'can_attend_until' => 'nullable|date',
        'isResultPublished' => 'nullable|boolean',
        'result_published_on' => 'nullable|date',
        // 'exm_start' => 'required|date_format:"H:i"',
        //valu of 'exm_end_at' consider as time, not a data
        // 'exm_end_at' => 'required|date_format:"H:i"|before:exm_start',
        // 'exm_end_at' => 'required|date_format:"H:i"|after:exm_start|after_or_equal:exm_start + exm_duration',
        // 'exm_end_at' => 'required|date_format:"H:i"',
        'exm_date' => 'required',
        'exm_duration' => 'required|integer',
        'for_cr' => 'nullable|integer|max:5',
        'for_wr' => 'nullable|max:5',
        'for_skp' => 'nullable|integer|max:5',
        'pass_mark' => 'nullable|integer',
        // 'status' => 'nullable|integer|max:255',
        'total_mark' => 'nullable|integer',
        'total_question' => 'nullable|integer',
        'Is_prevent_change_option' => 'nullable|boolean',
        'ransomized_question' => 'nullable|boolean',
        'mouse_track' => 'nullable|boolean',
        'window_track' => 'nullable|boolean',
        'have_moderate' => 'nullable|boolean',
        'have_moderable_question' => 'nullable|boolean',
        'is_moderated' => 'nullable|boolean',
    ];

    public function updatedExmTypeOf()
    {
        if ($this->exm_type === 'mcq') {
            $this->validate([
                'for_cr' => ['required'],
            ]);
        }
    }


    public function render()
    {
        return view('livewire.vendor.exams-schedule.schedule-form')->extends("layouts.vendor.app");
    }


    //get necesity data after mounting
    public function mount()
    {
        $this->groups = Auth::user()->vendorGroups;
    }


    public function submitScheduleForm($type, $typeOf)
    {
        $this->exm_type = $type;
        $this->exm_type_of = $typeOf;
        // dd($this->all());
        $validatedData = $this->validate();
        $this->updatedExmTypeOf();

        try {
            // dd();
            $m_id = Auth::id();
            $attandance_id = uniqid("exm-");
            $validatedData["attend_endpoint"] = $attandance_id;
            $validatedData["vendor"] = $m_id;
            $validatedData["exm_function"] = "0";
            $validatedData['status'] = $this->is_published ?  1 :  0;

            // Create new exam model and assign the values from validated data.
            # [Note]: We are using `Str::random()` to generate a random string for `exam intrance id`field.
            $newExam = group_has_exam::create($validatedData);

            // dd($intrance_id);
            $this->re_set();
            // session()->flash('message', 'Examen agregado con exito');
            $this->dispatch("notifySuccess", message: "Schedule Created !");
            $this->redirectIntended(route("vendorExamSchedule.index"), navigate: true);
            // dd($this->all());
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch("notifyInfo", message: "Have an error to create schedule. check logs...");
            dd($th);
        }
    }

    //reseting function
    public function re_set()
    {

        $this->reset("exm_type", "exm_name", "exm_subject", "group", "exm_date", "exm_start", "exm_duration", "for_cr", "for_wr", "for_skp");
        $this->dispatch("notifyInfo", message: "All field  has been reseted.");
    }

    // add group 

    //create instant group
    public function createInstantGroup()
    {
        try {
            //try creat instant group
            if (!empty($this->instantGroupName)) {
                // dd($this->instantGroupName);
                DB::table("groups")->insert([
                    "name" => $this->instantGroupName,
                    "vendor" => Auth::id(),
                ]);
            }
            $this->reset("instantGroupName");
            // $request->toArray()
            // array_push($this->groups, );
            // $this->groups = Group::where("vendor", Auth::id())->get();
            // $this->dispatch("notifySuccess", message: ["title" => "Group Created !"]);
            // $this->dispatch("refresh");
            $this->showInstantGroupInput = false;
            $this->dispatch("notifySuccess", "Group created.");
            $this->dispatch("refresh");
            $this->reset("instantGroupName");
        } catch (\Throwable $th) {
            //if gorup won't created
            throw $th;
            // dd($th);
            $this->dispatch("notifyWarning", message: "Have an error to create instant group.");
        }
        $this->dispatch("notifySuccess", "Group created.");
        $this->dispatch("refresh");
        $this->reset("instantGroupName");
    }

    //show instantGroupInput
    public function instantGroupInput()
    {
        $this->showInstantGroupInput = !$this->showInstantGroupInput;;
    }

    public function eventTest()
    {
        // Session()->flash();
        // alert by session
        // Session::push("success", "session puted");
        // Session::flash("success", "session flass success");
        // $this->dispatchBrowserEvent("notifySuccess", [
        //     "message" => [
        //         "title" => "Session Flash Success!",
        //         "content" => "This is session flash success.",
        //     ],
        // ]);
        $this->dispatch('notifySuccess', message: "Nofity success event fired !");
    }
}
