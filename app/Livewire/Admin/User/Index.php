<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('administrator - vendors')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.user.index')->extends("layouts.administrator.app")->section("content");
    }
}
