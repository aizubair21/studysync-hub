<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Title('administrator - vendors')]
class Index extends Component
{
    public $search = "search data from livewire";
    public $actions = [];
    public function render()
    {
        return view('livewire.admin.user.index')->extends("layouts.administrator.app")->section("content");
    }


    public function search()
    {
        // TODO: Implement search() method.
    }


    #[on('getActionsArray')]
    public function getActionsArray($actions)
    {
        $this->actions = $actions;
    }
}
