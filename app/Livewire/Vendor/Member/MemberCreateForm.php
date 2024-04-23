<?php

namespace App\Livewire\Vendor\Member;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;

#[Title('Members | Add New Members')]
class MemberCreateForm extends Component
{
    /**
     * public property store the client side data
     * public property which are required to submit
     */

    public $username, $email, $name, $password, $role, $phone, $group, $gender;

    /**
     * public property to sotre and send server data to client-side
     */
    public $allRole, $groups;

    /**
     * default render method
     * this method render the view file
     */
    public function render()
    {
        return view('livewire.vendor.member.member-create-form')->extends("layouts.vendor.app")->section('content');
    }


    //mount method to get and prepared data to send front-side
    public function mount()
    {
        $this->allRole = DB::table("roles")->whereBetween("name", ["member", "supervisor"])->get();
        $this->groups = Group::where("vendor", Auth::id())->get();
    }

    // create new member
    public function store()
    {
        try {

            $validateData = $this->validate([
                "email" => "required|unique:users",
                "name" => "required|min:5|max:15",
                "password" => "required|min:12|max:50",
                "role" => "required",
                "group" => "required|integer",
                "gender" => "required|string",
            ]);

            //user instance create
            $currentUser = User::insertGetId([
                "vendor" => Auth::id(),
                "name" => $this->name,
                "email" => $this->email,
                "password" => Hash::make($this->password),
            ]);

            //add role 
            User::find($currentUser)->assignRole($this->role);
            $this->redirectIntended(route("vendorMember.index"), true);

            // dd($validateData);
        } catch (\Throwable $th) {
            dd($th);
        }
        // $this->redirectIntended(route("vendorMember.index"), true);
    }
}
