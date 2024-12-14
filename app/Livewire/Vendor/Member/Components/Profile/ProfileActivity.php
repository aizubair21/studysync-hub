<?php

namespace App\Livewire\Vendor\Member\Components\Profile;

use App\Models\Group;
use App\Models\group_has_exam;
use App\Models\group_has_student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class ProfileActivity extends Component
{
    public $user, $peviewUserToGropModal;
    public $activity; #exams, groups, questions, posts, comments, likes, dislikes, messages, friends, followers, following
    public function render()

    // private $listeners = [];

    {
        return view('livewire.vendor.member.components.profile.profile-activity', ['id' => $this->user]);
    }

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $query = User::where(["id" => decrypt($this->user), 'vendor' => Auth::id()])->first();
        $this->activity['group'] = $query->groups()->get()->toArray();
        // $this->activity['exam'] = $query->exams();
    }


    #[On('member-attached')]
    public function memberAttached()
    {
        $this->peviewUserToGropModal = !$this->peviewUserToGropModal;
        $this->getData();
    }


    //remove a member form group
    #[On('remove-member')]
    public function removeMemberFromGroup($id)
    {
        // dd($id);
        // $query->groups()->detach($id);
        // $data = ['vendor' => Auth::id()];
        // Group::find($id)->removeMember($id, $data);
        group_has_student::find($id)->delete();
        $this->getData();
    }
}
