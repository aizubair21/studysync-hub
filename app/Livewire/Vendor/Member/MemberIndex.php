<?php

namespace App\Livewire\Vendor\Member;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Members | Manage Member')]
class MemberIndex extends Component
{
    public $member;
    public function render()
    {
        return view('livewire.vendor.member.member-index')->extends("auth.teacher.app")->section('content');
    }
}
