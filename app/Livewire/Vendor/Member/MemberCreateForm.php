<?php

namespace App\Livewire\Vendor\Member;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Members | Add New Members')]
class MemberCreateForm extends Component
{
    public function render()
    {
        return view('livewire.vendor.member.member-create-form')->extends("auth.teacher.app")->section('content');
    }
}
