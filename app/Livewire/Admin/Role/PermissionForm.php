<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Component
{
    #[validate("required")]
    public $new_permission_name;
    public $permissions;
    public function render()
    {
        $this->getPermissionData();
        return view('livewire.admin.role.permission-form')->extends("layouts.administrator.app")->section("content");
    }

    //store new permission 
    public function  addPermission()
    {
        $validate = $this->validate();
        $this->getPermissionData();

        //permission comes either single or multipel. if multiple  then convert to array else make it an array with one element
        $permisionArrData = explode(",", $this->new_permission_name);
        foreach ($permisionArrData as $value) {
            if (!$this->permissions->contains('name', '=', trim($value))) {
                Permission::create(['name' => strtolower(trim($value))]);
                $this->dispatch("refresh-data"); 
                $this->dispatch("success", message: "Successfully  New Permission Created!. Now You Can Attached To A role");
                $this->getPermissionData();
            } else {
                $this->dispatch("warning", message: "Duplicate Entity");
            }
        }
        $this->reset("new_permission_name");
        // if (!$permissions->contains($permArray['new_permission_name'])) {
        //     auth()->user()->givePermissionTo($permArray['new_permission_name']);

        // if (!$permissions->contains($permArray)) {
    }


    //private function to get permission data
    private function getPermissionData()
    {
        $this->permissions = Permission::all();
    }
}
