<?php

namespace App\Livewire\Vendor\Member\Components\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProfileStatus extends Component
{
    public $user;
    public $profileStatus;
    public function render()
    {
        return view('livewire.vendor.member.components.profile.profile-status');
    }



    public function mount()
    {
        $this->queryData();
    }


    //get data from database
    public function getData()
    {
        $this->queryData();
    }

    private function queryData()
    {
        // dd(decrypt($this->user));
        if (isset($this->user)) {
            $this->profileStatus = User::where(['id' => decrypt($this->user), 'vendor' => Auth::id()])->get(['privilage', 'banned_on', 'subscription', 'subscription_till'])->toArray()[0];
        }
    }



    //udpated 
    public function updated($property)
    {
        if (Str::startsWith($property, 'profileStatus')) {
            # code...
            User::where(['id' => decrypt($this->user), 'vendor' => Auth::id()])->update($this->profileStatus);
        }
        $this->queryData();
    }
}
