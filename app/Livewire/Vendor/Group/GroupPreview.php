<?php

namespace App\Livewire\Vendor\Group;

use App\Models\Group;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;


#[Title('Groups | Preview')]
class GroupPreview extends Component
{
    /**
     * public property to store cmponents data
     */
    public $name, $group, $member;

    /**
     * property to store client side data
     */
    public  $selectedId = null;

    /**
     * toggol modal
     */
    public $confirmAddNewMember;

    // protected refresh listener
    protected $listeners = ['refresh' => '$refresh'];


    /**
     * URL paramitter
     */
    #[Url]
    public $gpid;


    public function render()
    {
        // return view('livewire.vendor.group.group-preview')->extends("layouts.vendor.app")->section('content');
        return view('livewire.vendor.group.group-preview')->extends("layouts.vendor.app");
    }


    /**
     * public mount method to get the groups via gorup id
     */
    public function  mount()
    {

        // dd($this->gpid);
        $this->group = Group::where(["id" => $this->gpid, "vendor" => Auth::id()])->with("students")->first();
        $this->member = User::where(["vendor" => Auth::id(), 'privilage' => 1])->orderBy("id", "desc")->get();
    }


    /**
     * Delete member from a targeted group
     * @param Group $group
     */
    public function detachMemberFromGroup(array $selectedArray)
    {
        // $user = Auth::user();

        /**
         * as we now on a targeted group class.
         * this class already hold the group information
         * so we don't need to take.
         */
        $gp = Group::find($this->gpid);

        //check comming array empty or not.
        if (!empty($selectedArray)) {
            // dd($selectedArray);
            # code...

            /**
             * loop through the comming array,
             * and iterate one by one
             */
            foreach ($selectedArray as $key => $value) {

                /**
                 * this removeMember method well defined in Group model
                 * this method take two arguments. one for member id, another is where conditional array.
                 */
                $gp->removeMember($value);
            }
        } else {
            dd("selecte to remove");
        }

        /**
         * here $selectedId is an alpine property, an array contain data. i need to make it clear.
         * so make it easier wity dispatch event, named 'clearValue'. 
         * and catch this event from alpine.
         * so, as soon as event fired.  the value will be cleared in x-model="selectedId"
         */
        $this->dispatch("clearValue");

        /**
         * 'refresh' event make the component update after  some action done.
         * you can use it when your component have many dependency.
         * or just simply refresh when something changed
         */
        $this->dispatch("refresh");
    }


    /**
     * public function to  add members into group
     * 
     * */


    /**
     * public function to banned member from group
     * @param member a member array
     */
    public function  banUser(array $member)
    {
        $gp = Group::find($this->gpid);

        if (!empty($member)) {
            foreach ($member as $key => $value) {
                $gp->updateMemberPivot($value, ['status' => 0]);
            }
        }

        $this->dispatch("clearValue");
        $this->dispatch("refresh");
    }


    /**
     * public function to un banned member from group
     * @param member a member array
     */
    public function  unBanedUser(array $member)
    {
        $gp = Group::find($this->gpid);

        if (!empty($member)) {
            foreach ($member as $key => $value) {
                $gp->updateMemberPivot($value, ['status' => 1]);
            }
        }

        $this->dispatch("clearValue");
        $this->dispatch("refresh");
    }


    /**
     * public function to attached member to group
     * @param selectedArra client side selection array
     */
    public function attachedMemberToGroup($selectedArray)
    {
        $gp = Group::find($this->gpid);
        if (!empty($selectedArray)) {
            # code...
            foreach ($selectedArray as $key => $value) {
                # code...
                Group::addMember($this->gpid, $value, ['vendor' => Auth::id(), "status" => 1]);
            }
        }
        $this->dispatch("refresh");
        $this->dispatch("clearValue");
        $this->confirmAddNewMember != $this->confirmAddNewMember;;
    }
}
