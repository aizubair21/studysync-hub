<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PermsToRoleForm extends Component
{
    public  $role_id, $permission_id, $user_id, $rols, $users, $permission;

    public function render()
    {
        $this->getData();
        return view('livewire.admin.role.perms-to-role-form')->extends('layouts.administrator.app')->section('content');
    }

    //assign permission
    public function assingPermissionToRole()
    {
        // dd($this->permissionToRoleForm["PermissionName"]);
        // $getPermisoion = Permission::where("name", $this->permissionToRoleForm["PermissionName"])->first(); 
        try {
            // Role::findById($this->permissionToRoleForm["RoleName"]);
            // $permission = Permission::where("name", $this->permissionToRoleForm["PermissionName"])->firstOrFail();
            // $permission = Permission::where("name", $this->permissionToRoleForm["PermissionName"])->first();
            // $role = Role::findById($this->permissionToRoleForm["RoleName"]);
            // $role->givePermissionTo($permission);

            //if already permit
            $isAlreadyPermit = DB::table("role_has_permissions")
                ->where("role_id", "=",  $this->role_id)
                ->where("permission_id", "=",  $this->permission_id)->count();
            // dd($isAlreadyPermit);
            if (!$isAlreadyPermit) {
                DB::table("role_has_permissions")->insert([
                    "permission_id" =>  $this->permission_id,
                    "role_id"       =>   $this->role_id
                ]);
                $this->resetForm();
                $this->dispatch("success", message: "Permission inserted to role.");
                $this->getData();
                $this->dispatch("refresh-data");
            }
            // $this->emit('success', 'Permiso asignado correctamente');
        } catch (\Throwable $th) {
            $this->dispatch("error");
            $this->dispatch("refresh-data");
        }
    }

    //assignPermissionToUser
    public function assignPermissionToUser()
    {
    }

    //getData 
    public function getData()
    {
        $this->rols = Role::all();
        $this->permission = Permission::all();
        $this->users = User::withoutRole('admin')->get();
    }
}
