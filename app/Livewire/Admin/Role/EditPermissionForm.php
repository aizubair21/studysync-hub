<?php

namespace App\Livewire\Admin\Role;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\On;

#[title("Administrator | edit role")]
class EditPermissionForm extends Component
{
    //component received a data by url 
    public $role, $roles, $name, $permissions, $select_role, $permission_id, $roleParamId;

    public function render()
    {
        return view('livewire.admin.role.edit-permission-form')->extends("auth.app")->section("content");
    }

    #[On('refresh-data')]
    public function refreshData()
    {

        $r = Role::with("permissions")->get();
        $this->role = $r[$this->select_role ? $this->select_role-1 : ""];
        $this->permissions  = Permission::all();
        $this->roles = Role::all();
    }
    public function mount($id)
    {
        $r = Role::find($id)->with("permissions")->get();
        $this->role = $r[$id - 1];
        $this->permissions  = Permission::all();
        $this->roles = Role::all();
        //refresh the components
    }

    //deletePermissionFromRole
    public function deletePermissionFromRole($rle, $perms)
    {
        $this->role->revokePermissionTo($perms);
        $this->dispatch("success", message: "Permission removed");
        $this->refreshData(request()->route()->parameter("id"));
        $this->dispatch("refresh-data");
        // $this->emit("refresh-data", $this->select_role);
    }

    //select another role
    public function  selectAnotherRole()
    {
        $Ar = Role::find($this->select_role)->with("permissions")->get();
        $this->role = $Ar[$this->select_role - 1];
        $this->dispatch("warning", message: "Editing permissions for " . $this->role->name . " role");
        // dd($this->role);
        // request()->route()->parameter("id", $this->select_role);
    }

    //add permissions to role
    public function addPermissionToRole()
    {
        foreach ($this->permission_id as $key => $value) {
            # code...
            DB::table("role_has_permissions")->insert([
                "permission_id" => $value,
                "role_id" => $this->role->id,
            ]);
        }
        $this->dispatch("refresh-data");
        $this->dispatch("succcess", message: "Permission Inserted !");
        // $this->role = $this->role[];
    }
}
