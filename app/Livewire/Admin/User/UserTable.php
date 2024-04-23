<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On;

use function Laravel\Prompts\search;

class UserTable extends Component
{
    // protected $listeners = ['delete'];
    public $actions = [];
    public $vendorData;
    public $search;
    public $vendor;
    public $vendor_update_id;
    public $is_update_form_show = false;
    public $name, $username, $email, $password, $is_role, $pack;
    public $phone;

    protected $listeners = ['refreshList' => '$refresh', "testToChild" => "testToChild", 'searchToChild' => 'searchToChild'];

    //computed

    public function render()
    {
        // return $this->search;
        return view('livewire.admin.user.user-table');
    }


    //mount method to get related data
    public function mount()
    {
        $this->vendorData = User::role("vendor")->get();
        // dd($this->search);
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

    //store to action
    public function actions()
    {
    }

    //search from parent with dispatch event
    public function searchToChild($search)
    {
        // $this->search = $search;
        // search from user model?
        if (!empty($search)) {

            $this->vendorData = User::role('vendor')
                ->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere("id", "like", "%{$search}%")
                ->get();
        } else {
            $this->vendorData = User::role("vendor")->get();
        }
    }
}
