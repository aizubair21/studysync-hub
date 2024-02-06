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
    public $role, $roles, $name, $permissions, $select_role, $permission_id = [], $DP_id = [], $roleParamId;

    public function render()
    {
        return view('livewire.admin.role.edit-permission-form')->extends("auth.app")->section("content");
    }

    #[On('refresh-data')]
    public function refreshData()
    {

        // $this->role = $r[$this->select_role];
        $this->role = Role::where("id", "=", $this->select_role)->with("permissions")->first();
        $this->permissions  = Permission::all();
        $this->roles = Role::all();
    }
    public function mount($id)
    {
        $this->select_role = $id;
        $this->role = Role::where("id", "=", $this->select_role)->with("permissions")->first();
        $this->permissions  = Permission::all();
        $this->roles = Role::all();
        //refresh the components
    }

    //deletePermissionFromRole
    public function deletePermissionFromRole()
    {
        foreach ($this->DP_id as $key => $value) {
            DB::table("role_has_permissions")->where(["permission_id" => $value, "role_id" => $this->role->id])->delete();
        }
        $this->dispatch("success", message: "Permission removed");
        $this->dispatch("refresh-data");
        $this->reset("DP_id");
        // $this->emit("refresh-data", $this->select_role);
    }

    //select another role
    public function  selectAnotherRole()
    {

        // dd(Role::where("id", "=", $this->select_role)->with("permissions")->first());
        // $Ar = Role::with("permissions")->get(); //return all role table with permission
        $this->role = Role::where("id", "=", $this->select_role)->with("permissions")->first(); //define targeted role from role array
        $this->dispatch("warning", message: "Editing permissions for " . $this->role->name . " role"); //toaster message event
        // $this->refreshData(request()->route()->parameter($this->select_role));
        // dd($this->role);
        // request()->route()->parameter("id", $this->select_role);
    }

    //add permissions to role
    public function addPermissionToRole()
    {
        // dd($this->role->id, $this->permission_id);
        foreach ($this->permission_id as $key => $value) {
            # code...
            //check if already have this permission to role
            $isAlreadyPermit = DB::table("role_has_permissions")->where(["permission_id" => $value, "role_id" => $this->role->id])->count();
            if (!$isAlreadyPermit) {

                DB::table("role_has_permissions")->insert([
                    "permission_id" => $value,
                    "role_id" => $this->role->id,
                ]);
            } else {
                $this->dispatch("warning", message: "Permission already exists");
            }
        }
        $this->dispatch("refresh-data");
        $this->dispatch("succcess", message: "Permission Inserted !");
        // $this->reset($this->permission_id);
        // $this->role = $this->role[];
    }
}
