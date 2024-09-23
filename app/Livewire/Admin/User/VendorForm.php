<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Http\Requests\admin\vendor\vendorStoreRequest;
use App\Models\User;
use Database\Seeders\role;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

// use Livewire\Attributes\Validate;

#[title("administrator - vendor create")]
class VendorForm extends Component
{
    /**
     * public property to store components data, that sahre to client side
     */
    public $student, $roles;

    /**
     * Listeners to refresh the initial components
     */
    protected $listener = ['refreshList' => '$refresh'];

    /**
     * public property to store client side data
     * further work in component
     */
    #[Validate('required')]
    public $name, $username, $email, $password, $is_role, $pack;
    public $phone;

    public function storeVendor()
    {
        $this->validate();
        $userId = DB::table("users")->insertGetId([
            "name" => $this->name,
            'email' => $this->email,
            "vendor" => Auth::id(),
            "password" => Hash::make($this->password),
        ]);

        if ($userId) {
            $user = User::find($userId);
            $user->assignRole($this->is_role);
        }
        return $this->redirect(route("adminVandor.index"), navigate: true);
    }


    // public function storeVendor(Request $vd)
    // {
    //     try {

    //         //validate 
    //         $validated = $this->validate([
    //             "username" => "required",
    //             "password" => "required|min:12|max:255",
    //             "name" => "required|min:5|max:25",
    //             'email' => "required|string|email|max:255",
    //             "is_role" => "required|string|max:5",
    //             "pack" => "required|string",
    //         ]);

    //         dd($validated);

    //         // Store data in variable
    //         $data = [
    //             "username" => $this->username,
    //             'phone' => $this->phone,
    //             'name' => $this->name,
    //             'pack' => $this->pack,
    //             'email' => strtolower($this->email),
    //             'password' => bcrypt($this->password)
    //         ];

    //         // Create a new user and save it to database
    //         $user = User::insertGetId($data);

    //         if ($user) {
    //             //is vandor inserted to database and get the id of vendor
    //             //attached the targeted role to user
    //             switch ($this->is_role) {
    //                 case '5':
    //                     # code... if the role is teachers or instructor
    //                     $role = "instructor";
    //                     $user->assignRole($role);
    //                     // $user->assignRole('writer')
    //                     break;

    //                 case '2':
    //                     # code... if the role is student
    //                     $role = "student";
    //                     $user->assignRole($role);
    //                     break;

    //                 case '1':
    //                     # if the role is parent
    //                     $role = "parent";
    //                     $user->assignRole($role);
    //                     break;


    //                 default:
    //                     # code...
    //                     $user->assignRole("subscriber");
    //                     break;
    //             }
    //         }
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         // Log::error($th);
    //         return response()->json($th);
    //     }
    // }



    public function render()
    {
        return view('livewire.admin.user.vendor-form')->extends("layouts.administrator.app")->section("content");
    }

    /**
     * mount method. to get related data with initial components render
     */
    public function mount()
    {
        $this->roles = \Spatie\Permission\Models\Role::all();
    }
}
