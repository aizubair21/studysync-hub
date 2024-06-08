<?php

namespace App\Livewire\Admin\Role;

use Exception;
use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\On;

class PermissionIndex extends Component
{
    public $permissions;

    /**
     * property to toggle modal
     */
    public $confirmNewPermissionModal;

    public function render()
    {
        $this->getData();
        return view('livewire.admin.role.permission-index')->extends("layouts.administrator.app")->section("content");
    }

    //get data
    #[On('refresh-data')]
    public function getData()
    {
        $this->permissions = Permission::orderBy("id", "desc")->get();
    }

    //delete permission
    public function deltePermission(Permission $permisions)
    {
        if ($permisions) {
            $permisions->delete();
            $this->dispatch("notifySuccess", message: "Permission Deleted !");
            $this->getData();
        } else {
            $this->dispatch("notifyWarning", message: "There is no such a permission!");
        }
    }
}
