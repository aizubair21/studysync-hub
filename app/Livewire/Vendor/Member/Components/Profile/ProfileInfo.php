<?php

namespace App\Livewire\Vendor\Member\Components\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class ProfileInfo extends Component
{
    public $user;
    public $member, $hasMember = false;
    public function render()
    {
        return view('livewire.vendor.member.components.profile.profile-info');
    }


    // moutn method 
    public function mount($user)
    {
        // $user = decrypt($user);
        $this->member = User::where(["id" => decrypt($user), 'vendor' => Auth::id()])->get(['name', 'username', 'email', 'phone'])->toArray()[0];
        // $member['name'] = $data[0]['name'];
        $this->hasMember = $this->member == !NULL ? true : false;
        // dd($this->member);
    }


    //update lifecycle hookd
    public function updated($property)
    {
        if (Str::startsWith($property, 'member')) {
            //udate the data
            User::where(['id' => decrypt($this->user), 'vendor' => Auth::id()])->update($this->member);
        }

        $this->dispatch("refresh");
    }
}
