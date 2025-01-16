<?php

namespace App\Livewire\Vendor\Group;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Group;
use App\Models\group_has_student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Card extends Component
{
    /**
     * url data
     * @param Group
     */
    public $serverData, $gid;
    public $index;

    /**
     * modal
     */
    public $confirmEditModal;


    /**
     * components data
     */
    public $group, $editableGroup, $memberGroup, $groupExam;


    public function mount($gid)
    {
        $this->gid = decrypt($gid);
        $this->getData();
    }

    /**
     * updated hooks to determined if any property upaate
     */
    public function updated($property)
    {
        // Str::before($subject, 'search');
        if (Str::startsWith($property, 'editableGroup')) {
            // dd($this->serverData);
            // Group::updateOrCreate($this->editableGroup);
            // Group::updateOrCreate()
            // $this->serverData->name = $this->editableGroup['name'];
            // $this->serverData->save();
            // $this->dispatch('refresh');
            $this->UpdateGroupInfo();
        }
    }


    public function UpdateGroupInfo()
    {
        $this->serverData->name = $this->editableGroup['name'];
        $this->serverData->is_private = $this->editableGroup['is_private'];
        $this->serverData->status = $this->editableGroup['status'];
        $this->serverData->info = $this->editableGroup['info'];
        $this->serverData->banned_on = $this->editableGroup['banned_on'];
        $this->serverData->save();
        $this->confirmEditModal = !$this->confirmEditModal;
        $this->getData();
        // $this->dispatch('refresh');
    }


    private function getData()
    {
        $this->serverData = auth()->user()->vendorGroups()->find($this->gid);
        // dd($this->serverData);
        $this->group = $this->serverData;
        $this->editableGroup = $this->serverData->toArray();

        // dd($this->group['name']);
    }

    public function render()
    {
        return view('livewire.vendor.group.card')->extends("layouts.vendor.app");
    }


    /**
     * destroy method
     * destory single data
     * @param group id
     */
    public function destroySingle(Group $gp)
    {
        // dd('destroy single ');
        if (Auth::id() == $gp->vendor) {
            # code...
            // dd($gp);
            $gp->delete();
            // $gp->save();
        }

        $this->dispatch('refresh');
    }
}
