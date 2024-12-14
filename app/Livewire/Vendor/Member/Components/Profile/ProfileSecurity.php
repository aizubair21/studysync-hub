<?php

namespace App\Livewire\Vendor\Member\Components\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

// [title()]
class ProfileSecurity extends Component
{
    public $user, $member;
    //catch $refresh emiter
    protected $listeners = ['refresh' => 'getData'];
    public function render()
    {
        return view('livewire.vendor.member.components.profile.profile-security');
    }

    //mount method
    #use on 
    // [On('refresh')]
    public function mount()
    {
        $this->getData();
    }


    //get deta
    //add ON event listenrer

    public function getData()
    {
        $this->member = User::where(['id' => decrypt($this->user), 'vendor' => Auth::id()])->get(['privilage', 'banned_on'])->toArray()[0];
        $hasRole = User::find(decrypt($this->user))->getRoleNames();
        $this->member['role'] = $hasRole ? $hasRole->toArray() : [];
    }


    //updated
    public function updated($property)
    {
        if (Str::startsWith($property, 'member')) {
            # update 
            User::where(['id' => decrypt($this->user), 'vendor' => Auth::id()])->update($this->member);
        }
    }



    #custom method
    public function removeUserRole()
    {
        User::find(decrypt($this->user))->syncRoles([]);
        $this->dispatch('remove-user-rome');
        $this->dispatch('refresh');
    }


    #attached user role
    public function attachedUserRole()
    {
        User::find(decrypt($this->user))->syncRoles(['member']);
        //throw a refresh emitter
        // $this->emit('refresh');
        $this->dispatch('refresh');
    }
}
