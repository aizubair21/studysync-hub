<?php

namespace App\Livewire\Vendor\Group;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Groups | Manage Groups')]
// #[Layout('auth.teacher.app')]
class GroupIndex extends Component
{
    public function render()
    {
        return view('livewire.vendor.group.group-index')->extends("auth.teacher.app")->section('content');
    }
}
