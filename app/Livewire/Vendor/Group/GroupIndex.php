<?php

namespace App\Livewire\Vendor\Group;


use App\Models\Group;
use App\Models\group_has_student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;


#[Title('Groups | Manage Groups')]
// #[Layout('auth.teacher.app')]
class GroupIndex extends Component
{

    /**
     * public property to store client side data
     */
    public $memberGroup = [], $action = [], $g_name, $g_image, $edit_group = [], $groupSearchVal;


    /**
     * toggoling modal
     */
    public $isShowModal = false, $confirmingLogout, $confirmEditModal, $confirmMemberAddModal;


    /**
     * public property to store components data. that shown in slient side
     */
    public $members, $groups;


    /**
     * protected listener for listen refresh listener
     * listener refresh the ential components with update data
     */
    protected $listeners = ['refresh' => '$refresh'];


    public function render()
    {
        // return view('livewire.vendor.group.group-index')->extends("layouts.vendor.app")->section('content');
        return view('livewire.vendor.group.group-index')->extends("layouts.vendor.app");
    }


    //mount 
    public function mount()
    {
        // $this->groups = Group::where("vendor", Auth::id())->with('students')->get();
        $this->groups = Auth::user()->vendoreGroupsWithMembersCount;
        $this->members = Auth::user()->students;
    }


    //check
    public function check($target = null)
    {
        if ($target) {
        }
    }


    //delete method to delete groups
    public function destroy()
    {
        foreach ($this->action as $key => $value) {
            Group::find($value)->delete();
            $this->dispatch("refresh");
        }
        $this->action = [];
    }


    //create instant group
    public function createInstantGroup()
    {
        try {
            //try creat instant group
            if (!empty($this->g_name)) {
                // dd($this->g_name);
                DB::table("groups")->insert([
                    "name" => $this->g_name,
                    "vendor" => Auth::id(),
                ]);
            }
            $this->reset("g_name");
            // $request->toArray()
            // array_push($this->groups, );
            $this->groups = Group::where("vendor", Auth::id())->get();
            // $this->dispatch("notifySuccess", message: ["title" => "Group Created !"]);
            // $this->dispatch("refresh");
            $this->confirmingLogout = !$this->confirmingLogout;;
        } catch (\Throwable $th) {
            //if gorup won't created
            throw $th;
            dd($th);
            $this->dispatch("notifyWarning", message: ["title" => "Have an error to create instant group."]);
        }
        $this->reset("g_name");
    }


    //show edit modal by clicking edit button
    public function showEditModal($modal)
    {
        $egp = Group::find($modal);
        $this->edit_group['id'] = $egp["id"];
        $this->edit_group["name"] = $egp["g_name"];
        $this->edit_group["admin"] = $egp["g_admin"];
        $this->edit_group["moderator"] = $egp["g_moderator"];
        $this->confirmEditModal = !$this->confirmEditModal;
    }


    //update group by instant group modal
    public function updateInstantGroup()
    {
        try {

            Group::find($this->edit_group["id"])->update([
                "g_name" => $this->edit_group['name']
            ]);
            $this->confirmEditModal = !$this->confirmEditModal;
            $this->dispatch("refresh");
            $this->confirmMemberAddModal = !$this->confirmMemberAddModal;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


    //add member to group
    public function addMemberToGroup()
    {
        // $authId = auth()->user()->id;
        try {

            // DB::table('group_has_students')->insert([
            //     "group_id" => $this->action[0],
            //     "user_id" => $this->memberGroup,
            //     "vendor" => $authId,
            //     "status" => 1,
            // ]);

            // $gp = Group::find($this->action[0]);
            if (!empty($this->memberGroup)) {
                # code...
                Group::addMember($this->action[0], $this->memberGroup, ['vendor' => Auth::id(), "status" => 1]);
                // foreach ($this->memberGroup as $key => $value) {
                //     # code...
                // }
            }

            $this->confirmMemberAddModal = !$this->confirmMemberAddModal;
            $this->dispatch("refresh");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


    //public function group search
    public function groupSearch()
    {
        // dd($this->groupSearchVal);
        if ($this->groupSearchVal != "") {

            $this->groups = Group::where('vendor', Auth::id())
                ->where("name", "like", "%{$this->groupSearchVal}%")
                ->orWhere("info", "like", "%{$this->groupSearchVal}%")
                ->orWhere("id", "like", "%{$this->groupSearchVal}%")->get();
        } else {
            $this->groups = Group::where("vendor", Auth::id())->with('students')->get();
        }
    }
}
