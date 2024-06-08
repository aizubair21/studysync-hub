<div x-data="{ confirmMemberAddModal: false, search: false, showOn: null }">
    {{-- The best athlete wants his opponent at his best. --}}
    {{-- header  --}}
    {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                    role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav> --}}
    <!-- /.navbar -->


    {{-- breadcrumbs/content header  --}}
    <x-content-header>
        <li class="breadcrumb-item">
            <a href="{{ route('vendorMember.index') }}">Members</a>
        </li>
        <li class="breadcrumb-item">
            Index
        </li>
    </x-content-header>
    {{-- breadcrumbs/content header  --}}


    <div>
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}


        {{-- table info header  --}}
        <div class="d-flex justify-content-between align-items-center p-2 w-100 overflow-x-scroll scrolbar-none">

            <div class="d-flex justify-content-start flex-1 w-100">

                <div class="btn btn-sm border-primary rounded py-2 me-2" x-on:click="search = !search">
                    <i class="fas fa-search"> </i>
                </div>

                <button title="delete parmanent" x-show="$wire.action.length > 0" class="btn btn-danger btn-sm mx-2">
                    <i class="fas fa-trash"></i>
                </button>

                <button title="make mute" x-show="$wire.action.length > 0" class="btn btn-info btn-sm">
                    <i class="fas fa-bell"></i>
                </button>

                <a x-show="$wire.action.length == 1" wire:navigate href="{{ route('vendorGroup.edit', [1]) }}"
                    class="btn btn-sm  text-center   ">
                    Edit
                </a>

                <button x-show="$wire.action.length == 1" class="btn btn-sm  text-center   " title="Quick view">
                    View
                </button>

                <button x-show="$wire.action.length > 0" class="btn btn-sm  text-center btn-success mx-2  "
                    title="create a new group  with this selected students" wire:click="$toggle('confirmAddNewGroup')">
                    <i class="fas fa-plus me-2"></i> Make Group
                </button>

            </div>

            {{-- right side --}}
            <div>
                <button class="btn btn-outline-info btn-sm" wire:click="$toggle('confirmMemberAddModal')"> <i
                        class="fas fa-plus me-2"></i> Create </button>
            </div>
        </div>
        {{-- table info header  --}}


        <div>
            <input x-show="search" type="search" wire:model="search" wire:change="doSearchMember"
                placeholder="Type to search" id="search" class=" form-control rounded">
        </div>

        {{-- table --}}
        <div class=" overflow-x-scroll pb-3 scrolbar-none">
            <table class="table table-striped  my-3" id="dataTables">
                <thead>
                    <tr>
                        <x-th></x-th>
                        <x-th>Name</x-th>
                        <x-th>Email</x-th>
                        <x-th>Phone</x-th>
                        <x-th>Group</x-th>
                        <x-th> Permit </x-th>
                        <x-th>Added On</x-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $key => $member)
                        <tr>
                            <x-td style="position:sticky; left:0; background-color:white;">
                                <input type="checkbox" style="width:20px; heigh:20px;" wire:model="action"
                                    wire:input="getAction" id="member_{{ $member->id }}" value="{{ $member->id }}">
                            </x-td>
                            <x-td>{{ $member->name }}</x-td>
                            <x-td>{{ $member->email }}</x-td>
                            <x-td>{{ $member->phone }}</x-td>
                            <x-td>
                                <div class="btn btn-info btn-sm">Default</div>
                            </x-td>
                            <x-td>

                            </x-td>
                            <x-td>
                                {{ $member->created_at }}
                            </x-td>

                        </tr>
                    @endforeach
                    @if (count($members) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Data Found !</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{-- @livewire('vendor.member.components.table.table', ['user' => $user], key($user->id)) --}}

            {{-- livewire table components --}}
            {{-- @livewire('vendor.member.components.table.table', [
                'header' => $header,
                'members' => $members,
            ]) --}}

            {{-- <livewire:vendor.member.components.table.table :$header :$members> --}}

            {{-- <table class="table"> --}}
            {{-- @livewire('vendor.member.components.table.head', ['user' => $user], key($user->id)) --}}

            {{-- head  --}}
            {{-- @livewire('vendor.member.components.table.head', ['header' => $header]) --}}

            {{-- body  --}}
            {{-- @livewire('vendor.member.components.table.body', ['data' => $members]) --}}

            {{-- </table> --}}


        </div>
    </div>


    {{-- <livewire:vendor.questions.create> --}}

    {{-- <x-wire-link>
        Test
    </x-wire-link>
    <x-section-title>
        <x-slot name="title">
            section title
        </x-slot>
        <x-slot name="aside">
            aide from section title
        </x-slot>

        <x-slot name="description">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, cumque deleniti. Est nesciunt error, unde
            deleniti dignissimos nisi, nulla eius ipsum quo maiores recusandae magni, eligendi modi odit fugiat vitae
            facere totam quis molestias fuga veniam architecto. Architecto laudantium, corrupti totam, voluptates quia
            minus odio esse aliquid a veritatis impedit!
        </x-slot>

    </x-section-title> --}}


    {{-- components add users modal  --}}
    <x-dialog-modal wire:model.live="confirmMemberAddModal">
        <x-slot name="title">
            {{ __('Add Member/Student To Your Space ') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">
            <div>

                <form wire:submit.prevent="addMemberToSpace">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="name">Name :</label>
                        <input type="text" class="rounded form-input w-50 @error('name') is-invalid @enderror"
                            placeholder="Give a name...." id="name" wire:model="name">
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="email">Email :</label>
                            @error('email')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="email" class="rounded form-input w-50 @error('email') is-invalid @enderror"
                            placeholder="Give a valid email" id="email" wire:model.live="email">
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password">Password :</label>
                        <input type="text"
                            class="rounded form-input w-50 @error('instantPassword') is-invalid @enderror"
                            placeholder="Protect with password" id="password" wire:model="instantPassword">
                    </div>

                    <div class="w-100 text-end">

                        <button class="ms-3 btn btn-lg btn-success  mt-3" wire:loading.attr="disabled" type="submit">
                            <i class="fas fa-save me-2"></i> Insert
                        </button>
                    </div>
                </form>
            </div>

            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmMemberAddModal')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

        </x-slot>
    </x-dialog-modal>
    {{-- components add users modal  --}}


    {{-- components new group with slected students modal  --}}
    <x-dialog-modal wire:model.live="confirmAddNewGroup" x-data="{ name: null }">
        <x-slot name="title">
            {{ __('Create new group with selected members') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">

            <div>
                <label for="new_group_name">Group Name: </label>
                <input type="text" wire:model="newGroupName" placeholder="Give a name of your group"
                    id="new_group_name" class="form-control">
            </div>

            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmAddNewGroup')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="btn btn-success btn-md mx-2" x-on:click="$wire.createNewGroupFromIndex">
                submit
            </button>

        </x-slot>
    </x-dialog-modal>
    {{-- components new group with slected students modal  --}}
</div>
