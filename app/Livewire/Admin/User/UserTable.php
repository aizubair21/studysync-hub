<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserTable extends Component
{
    public $vendorData;
    public $search = '';
    public $vendor;
    public $vendor_update_id;
    public $is_update_form_show = false;
    protected $listeners = ['refreshList' => 'refreshList'];

    public $name, $username, $email, $password, $is_role, $pack;
    public $phone;


    //computed

    public function render()
    {
        $this->vendorData = User::withoutRole('admin')->get();
        return view('livewire.admin.user.user-table');
    }

    //drop vendor 
    public function dropVendor(User $vendor)
    {
        $vendor->delete();
        $this->refreshList();
    }

    //edit vendor 
    public function editVendor(User $vendor)
    {
        $this->is_update_form_show = !$this->is_update_form_show;
        // $this->vendor_update_id = $vendor;
        $this->vendor_update_id =  $vendor->id;
        $this->name = $vendor->name;
        $this->email = $vendor->email;
    }

    //hide update form
    public function hide_update_form()
    {

        $this->is_update_form_show = !$this->is_update_form_show;
        $this->refreshList();
    }

    //update vendor 
    public function updateVendor()
    {
        DB::table("users")->where("id", "=", $this->vendor_update_id)->update([
            "name" => $this->name,
            'email' => $this->email,
        ]);
        $this->hide_update_form();
        $this->refreshList();
    }

    //query vendor
    public function queryVendor(User $vendor)
    {
    }

    //refresh list 
    public function refreshList()
    {
        $this->vendorData = User::withoutRole('admin')->get();
    }
}
