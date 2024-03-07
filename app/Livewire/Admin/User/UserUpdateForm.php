<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;

class UserUpdateForm extends Component
{
    public function render()
    {
        return view('livewire.admin.user.user-update-form')->extends("layouts.administrator.app")->section("content");;
    }
}
