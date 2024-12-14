<?php

namespace App\Livewire\Vendor\Member;

use Livewire\Component;
use App\Models\User;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;

class MemberInfo extends Component
{
    public $id;
    public $member, $memberGroup, $memberExams;
    public $groups, $showMemberAside;
    public $search;
    public $confirmMemberAddModal;


    public function render()
    {
        return view('livewire.vendor.member.member-info')->extends("layouts.vendor.app");;
    }


    //
    public function mount($id)
    {
        $this->id = $id;
        $this->getData();
    }


    #[On('refresh')]
    public function getData()
    {
        try {
            $this->member = User::find(Crypt::decrypt($this->id));
            $this->memberGroup = $this->member->groups()->get();
            $this->showMemberAside = true;
            // dd($this->member);
        } catch (Exception $e) {
        };
    }
}
