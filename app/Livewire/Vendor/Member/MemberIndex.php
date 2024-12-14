<?php

namespace App\Livewire\Vendor\Member;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use PhpParser\Node\Expr\Cast\Array_;
use Ramsey\Uuid\Type\Integer;

class MemberIndex extends Component
{
    /**
     * public property to store the component data.
     * further send to client side
     */
    public $members = [], $groups, $showMemberAside, $memberForAside;

    /**
     * public property to store data from client side 
     */
    public $search, $name, $email, $instantPassword, $action = [], $newGroupName;

    /**
     * for toggoling modal
     */
    public $confirmMemberAddModal, $confirmMemberToGroupModal, $confirmAddNewGroup;

    /**
     * protected listeners
     */
    // protected $listeners =  ["refresh" => "$refresh"];
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.vendor.member.member-index')->extends("layouts.vendor.app");
    }

    /**
     * mount method to get the required data from model
     */
    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->members = User::with("roles")->where("vendor", Auth::id())->orderBy("id", "desc")->get();
        $this->groups = $this->groups = Group::where("vendor", Auth::id())->get();
    }

    //cutom method 
    // public function doPushNotification()
    // {
    //     $this->dispatch("doPushNotification", message: ['title' => "Test Post Notificaiton", "rid" => "1"]);
    // }


    /**
     * public function showMemberSidebar
     * @param Member
     * open side bar of member info
     */
    public function memberAside($m)
    {
        $this->showMemberAside = true;
        $this->memberForAside = $this->members[$m - 1];
        // dd($this->memberForAside->name);
    }


    /**
     * public functio to search member as soon as input change to the client
     */
    public function doSearchMember()
    {
        $members =  User::with("roles")->where("vendor", Auth::id())->orderby("id", "desc")->get();
        if ($this->search) {

            $getMembers = [];
            foreach ($members as $key => $member) {
                if (Str::contains(Str::lower($member->name), Str::lower($this->search))) array_push($getMembers, $member);
            }
            $this->members = $getMembers;
        } else {
            $this->members = $members;
            $this->dispatch("refresh");
        }
    }


    /**
     * public function to add member
     */
    public function addMemberToSpace()
    {
        // dd($this->all());
        $this->validate([
            'name' => "required",
            "email" => "required|unique:users",
            "instantPassword" => "required"
        ]);
        try {
            //code...
            $userId = User::insertGetId([
                'name' => $this->name,
                'vendor' => Auth::id(),
                'email' => $this->email,
                'password' => Hash::make($this->instantPassword),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            // dd($userId);
            User::find($userId)->assignRole("member");
            // User::find($currentUser)->assignRole($this->role);
            // $userId->save();
            $this->members = User::with("roles")->where("vendor", Auth::id())->orderBy("id", "desc")->get();
            $this->dispatch("refresh");
            $this->confirmMemberAddModal = !$this->confirmMemberAddModal;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


    /**
     * destory
     */
    public function destroyOne($id)
    {
        User::find($id)->delete();
        $this->dispatch("refresh");
    }

    /**
     * getAction function to set the member selected to arrya
     * 
     */
    public function getAction() {}



    /**
     * member add to a group
     */
    public function addMemberToGroup() {}


    /**
     * create new group by selecting member from member index
     */
    public function  createNewGroupFromIndex()
    {

        // dd($this->newGroupName);
        try {

            $gId = Group::insertGetId(
                [
                    "name" => $this->newGroupName,
                    "vendor" => Auth::id(),
                ]
            );
            $group = Group::find($gId);
            if ($group == false) return response()->json(['status' => 'fail'], 403);
            // $GpDb = Group::find($group);
            //get all selected members id and push into db.
            foreach ($this->action as $memberId) {
                Group::addMember($group->id, $memberId, ["vendor" =>  Auth::user()->id, "status" => 1]);
            }
            // return response()->json([
            //     "status" => "success",
            //     "message" => "Group Created Successfully.",
            //     "data" => $group
            // ], 200);
            $this->redirectIntended(route("vendorGroup.show", ["gpid" => $group->id, $group->name]), true);
            // return redirect()->route("vendorGroup.preview", ["gpid" => $group->id, $group->name]);
        } catch (\Throwable $th) {
            //throw $th;
            // Log::error("have an error to create group and add member from member index page."  . "\n" . $th);
            dd(response()->json($th));
            return response()->json([
                'status' => 'fail',
                'message' => 'Have an error when creating the group.'
            ], 500);
        }
    }


    #[on("showTableAction")]
    public function emitAction($actionArray)
    {
        // dd($actionArray);
        $this->action = $actionArray;
    }
}
