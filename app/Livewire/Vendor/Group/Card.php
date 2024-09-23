<?php

namespace App\Livewire\Vendor\Group;

use Livewire\Component;
use Livewire\Attributes\Url;

class Card extends Component
{
    /**
     * url data
     * @param Group
     */
    private $serverData, $gid;
    #[URL]
    public $index;


    /**
     * components data
     */
    public $group, $memberGroup, $groupExam;


    public function mount($gid)
    {
        $this->gid = decrypt($gid);
        $this->getData();
    }

    private function getData()
    {
        $this->serverData = auth()->user()->vendorGroups()->find($this->gid);
        $this->group = $this->serverData->toArray();
    }

    public function render()
    {
        return view('livewire.vendor.group.card')->extends("layouts.vendor.app");
    }
}
