<?php

namespace App\Livewire\Vendor\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Groups | Add new group')]
class Groupcreate extends Component
{

    /**
     * public property
     */
    public $name;

    public $member, $selectedMemberForGroup = [];

    public function render()
    {
        return view('livewire.vendor.group.groupcreate')->extends("layouts.vendor.app")->section('content');
    }


    /**
     * mount method
     */

    public function mount()
    {
        $this->member = User::where("vendor", Auth::id())->get();
    }


    /**
     * create the group
     */
    public function store()
    {
        $this->validate([
            "name" => "required|min:5|max:25",
        ]);

        Group::insert([
            "name" => $this->name,
            "vendor" => Auth::id(),
        ]);
        $this->redirectIntended(route("vendorGroup.index"), true);
    }
}
