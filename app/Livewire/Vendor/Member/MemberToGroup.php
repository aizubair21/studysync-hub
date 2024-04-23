<?php

namespace App\Livewire\Vendor\Member;

use App\Models\Group;
use App\Models\group_has_student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class MemberToGroup extends Component
{
    /**
     * public property to store components data
     */
    public $members, $groups;


    /**
     * public property to store client side data, that further use in components
     */
    public $memberGroup, $memberArray = [];

    public function render()
    {
        return view('livewire.vendor.member.member-to-group')->extends("layouts.vendor.app")->section('content');
    }
    /**
     * mount method to get the initial data
     */
    public function mount()
    {
        $this->groups = Group::where("vendor", Auth::id())->get();
        $this->members = User::where("vendor", Auth::id())->get();
    }

    //save method to save the member to group
    public function save()
    {
        /**
         * validate the input fields
         */
        $validataData = $this->validate([
            'memberGroup' => "required|integer",
            'memberArray' => "required|array"
        ]);

        /**
         * we use here try and catch metod.
         * to check if any specific task perfectly done or not.
         * if not, this gives us a error instead of breaking application. 
         */

        try {
            if ($validataData) {
                /**
                 * foreach to all memberarray. 
                 * if vendor select one or multiple member instance, it makes an array
                 * so we loop through memberArray and get one by one
                 */
                foreach ($this->memberArray as $key => $member_id) {
                    $alreadyExists = group_has_student::where(["user_id" => $member_id, "group_id" => $this->memberGroup])->count(); //chek is this student already attached with this group
                    if (!$alreadyExists) {
                        /**
                         * if member not attached with group.
                         * then attached to group
                         */
                        group_has_student::create(
                            [
                                "vendor" => Auth::id(),
                                'user_id' => $member_id,
                                "group_id" => $this->memberGroup,
                            ]
                        );
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
