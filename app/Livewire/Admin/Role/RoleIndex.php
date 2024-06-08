<?php

namespace App\Livewire\Admin\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

#[title("Administrator | Roles")]
class RoleIndex extends Component
{

    public $rols;
    public $users;
    public $rolsWithPermissions;
    public $rolsWithUsers;
    public $assign_role;
    public $assign_user;
    public $permission;
    public $permissionToRoleForm = [];

    #[Validate('required')]
    public $permissionsToRole;
    public $new_role_name;


    /**
     * property to toggle model
     */
    public $confirmAssignRoleToUserModal, $confirmNewRoleModal, $confirmNewPermissionModal, $confirmAssignPermissionToUser;


    public function render()
    {
        $this->getData();
        return view('livewire.admin.role.role-index')->extends("layouts.administrator.app")->section("content");
    }

    //get data
    private function  getData()
    {
        $this->rols =  Role::with('permissions')->get();
        $this->users = User::withoutRole('admin')->get();
        $this->permission = Permission::all();
    }

    //assign user to a role
    public function assignRoleToUser()
    {
        $this->confirmAssignRoleToUserModal = !$this->confirmAssignRoleToUserModal;
        // dd("assignRoleToUser event fired");
        //check if there are users with that role. If yes, give an error message and stop executing
        // return $id;
        $getRole = Role::findById($this->assign_role);
        //check if the assignUser already have the assignRole
        $alreadyHaveRole = DB::table("model_has_roles")->where("role_id", "=", $this->assign_role)->where("model_id", "=", $this->assign_user)->count();
        if ($alreadyHaveRole) {
            # code...
            $this->dispatch("notifyWarning", message: "Already have this role.");
        } else {
            User::find($this->assign_user)->assignRole($getRole->name);
            $this->dispatch("notifySuccess", message: "Role attached.");
        }


        // $usersWithThatRole = User::whereHas('roles', fn ($query) => $query->whereIn('id', [$this->roleTouser['role']]))->count();
        // if ($usersWithThatRole > 0) {
        // } else {
        // }
    }

    //add new role
    public function addNewRole()
    {
        // dd("event fired");
        //if not validate. return false
        if (empty($this->new_role_name)) {
            $this->dispatch("notifyWarning", message: "Give a valid role name. Name must be string.");
            $this->reset("new_role_name");
            // return "false";
        } else {

            try {
                if (Role::where('name', '=', $this->new_role_name)->exists()) {
                    $this->dispatch("notifyWarning", message: "This role already exists.");
                } else {
                    //create new role
                    // $newRol = Role::create(['name' => $this->new_role_name]);
                    Role::create(["name" => $this->new_role_name]);
                    $this->getData();
                    $this->dispatch("notifySuccess", message: "Role added. You can now select permissions for it.");
                    $this->confirmNewRoleModal = !$this->confirmNewRoleModal;

                    //give admin all permissions by default
                    // $permission = Permission::all();
                    // $newRol->syncPermissions($permission);

                    // //show success message
                    // session()->flash('success', "The role has been created successfully.");
                };
            } catch (\Exception $e) {
                //show error message
                // session()->flash('error', "An error occurred while creating the role. Please try again later");
                $this->dispatch("notifyWarning", message: "An error occurred while creating the role. Please try again later");
            }
            $this->reset('new_role_name');
        }
        // dd($validate);
        //if this role  already exists, show error message and exit the method
    }

    //delete role
    public function deleteRole($id)
    {
        //check if there are users with that role. If yes, give an error message and stop executing
        // return $id;
        $usersWithThatRole = User::whereHas('roles', fn ($query) => $query->whereIn('id', [$id]))->count();
        if ($usersWithThatRole > 0) {
            $this->dispatch("notifyWarning", message: "You can't delete your own role.");
        } else {


            //delete the role
            Role::findOrFail($id)->delete();

            $this->getData();
            $this->dispatch('notifySuccess', message: "Role has beed deleted. ");
            // $this->dispatch("notifyWarning", message: "On testing.");
        }
    }

    //refresh
    #[On('refresh-data')]
    public function refresh()
    {
        $this->getData();
    }
}
