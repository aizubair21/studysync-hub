<div>
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

    <div x-data="{ tableView: false, isShowAddModal: false }">
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}


        {{-- table view toggle buton --}}
        <div class="py-2 d-flex justify-content-between align-items-center">
            <div class="d-inline-flex bg-light p-2">
                <input type="checkbox" id="tableView" x-on:click="tableView = !tableView"
                    style="width: 20px; height:20px; margin-right:10px">
                <label for="tableView">Table View </label>
            </div>
            <div class="input-group" style="width: 150px">
                <input type="search" placeholder="search group" wire:model="groupSearchVal" wire:change="groupSearch"
                    id="groupSearch" class="form-control form-search">
            </div>
        </div>
        {{-- table view toggle button  --}}

        
        {{-- header  --}}
        <div class="mx-2 d-flex justify-content-between oveflow-s-scroll">
            <div class="d-flex">

                <button style="width:110px; margin-right:5px" class="btn btn-sm rounded btn-success "> <i
                        class="fas fa-sync" x-on:click="$wire.$refresh"> </i>
                    Refresh
                </button>
                @if (!empty($action))
                    <button style="width:110px; margin-right:5px" class="btn btn-sm rounded btn-danger "
                        wire:click="destroy">
                        <i class="fas fa-trash"> </i>
                        Delete
                    </button>
                    <button style="width:110px; margin-right:5px" class="btn btn-sm rounded btn-info "
                        wire:click="Mute">
                        <i class="fas fa-bell"> </i>
                        Mute
                    </button>
                    <button style="width:110px; margin-right:5px" @if (count($action) > 1) disabled @endif
                        class="btn btn-sm rounded btn-outline-info">
                        <i class="fas fa-info"> </i>
                        Info
                    </button>
                    <button style="width:110px; margin-right:5px" @if (count($action) > 1) disabled @endif
                        class="btn btn-sm rounded btn-outline-primary" wire:click="$toggle('confirmMemberAddModal')">
                        <i class="fas fa-plus"></i> Add Member
                    </button>
                @endif
            </div>

            <div>
                <button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled" type="button"
                    title="create a new instant group" class="btn btn-outline-dark">
                    <i class="fas fa-plus me-2"> </i>
                    New
                </button>
            </div>
        </div>
        {{-- ./header  --}}


        {{-- table  --}}
        <div class="px-2 row m-0">
            <div class="w-100 overflow-x-scroll">

                <table class="table table-striped" x-show="tableView" style="vertical-align: center">
                    <thead>
                        <x-th>A/C</x-th>
                        <x-th>Name</x-th>
                        <x-th>Status</x-th>
                        <x-th>Member</x-th>
                        <x-th>Info</x-th>
                        <x-th>Create</x-th>
                        <x-th>Last Update</x-th>
                        <x-th></x-th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($groups as $group)
                            <tr>

                                <x-td>
                                    <input type="checkbox" id="gp_{{ $group->id }}" value="{{ $group->id }}"
                                        wire:model="action" class="" wire:input="check"
                                        style="height:20px; width:20px">
                                </x-td>
                                <x-td>
                                    {{-- use PATCH metho  --}}
                                    <a href="#" class="link-primary text-decoration-none"
                                        wire:click="viewGroup({{ $group }})">
                                        {{ $group->name }}
                                    </a>
                                    <a wire:navigate
                                        href="{{ route('vendorGroup.show', ['gpid' => $group->id, $group->name]) }}">{{ $group->name }}
                                    </a>
                                </x-td>
                                <x-td>
                                    <span
                                        class="py-1 px-2 w-auto  me-2 bg-success rounded text-center mx-auto text-light">
                                        active <i class="fas fa-caret-right ms-2"></i> </span>
                                    <span class="py-1 px-2 bg-primary rounded text-center mx-auto text-light">
                                        {{ $group->is_private ? 'Private' : '  Public' }} </span>
                                </x-td>
                                <td class="d-flex align-items-center ">
                                    <p class="m-0"> {{ count($group->students) }} </p>

                                    {{-- <input type="checkbox" hidden wire:model.live="memberGroup" value="{{ $group->id }}"> --}}
                                </td>
                                <x-td>{{ $group->description }}</x-td>
                                <x-td>{{ $group->created_at }}</x-td>
                                <x-td>{{ $group->updated_at }}</x-td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-danger  btn-sm shadow"><i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-primary  btn-sm shadow mx-2"><i class="fas fa-pen"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            @foreach ($groups as $group)
                <div class="col-md-6 col-lg-4 rounded overflow-hidden p-2" x-show="!tableView">
                    <table class="table bg-none  my-3 px-3 bg-transparent shadow rounded">
                        <tbody>
                            <tr>
                                <td style="width:100px">
                                    <img src="{{ asset('media/awm.jpg') }}" alt="" class="rounded-full"
                                        style="width:70px; height:70px">
                                </td>
                                <td style="text-align:start!important">
                                    <div class="d-flex align-items-center">

                                        <input type="checkbox" id="gp_{{ $group->id }}" value="{{ $group->id }}"
                                            wire:model="action" class="" wire:input="check"
                                            style="height:20px; width:20px; margin-right:15px">
                                        <a wire:navigate
                                            href="{{ route('vendorGroup.show', ['gpid' => $group->id, $group->name]) }}"
                                            class="h5 m-0 font-semibold text-capitalize">
                                            {{ $group->name }}
                                        </a>
                                    </div>

                                    <div>
                                        <div class="d-flex">

                                            <div class="py-2 me-2 rounded w-auto">
                                                <i class="fas fa-user me-2"></i> {{ count($group->students) }}
                                            </div>
                                            <div class="py-2 rounded w-auto">
                                                <i class="fas fa-sync me-2"></i>
                                            </div>

                                        </div>
                                    </div>

                                    <button wire:click="showEditModal({{ $group->id }})"
                                        class="btn btn-sm btn-info mt-1">
                                        Edit
                                    </button>

                                    {{-- <a wire:navigate href="{{ route('vendorGroup.edit', [$group->id]) }}"
                                        class="btn btn-sm rounded btn-success my-2 my-sm-0"> <i class="fas fa-edit">
                                        </i>
                                        Edit</a> --}}


                                </td>
                            </tr>
                            <tr class="">
                                <x-td>
                                    <span
                                        class="py-1 px-2 d-block w-auto  me-2 bg-success rounded text-center mx-auto text-light">
                                        active <i class="fas fa-caret-right ms-2"></i> </span>
                                </x-td>
                                <x-td>
                                    <span class="py-1 px-2 bg-primary rounded text-center mx-auto text-light">
                                        {{ $group->is_private ? 'Private' : '  Public' }} </span>

                                </x-td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach

        </div>
        {{-- table  --}}

    </div>

    <!-- add instant group Modal -->
    <x-dialog-modal wire:model.live="confirmingLogout">
        <x-slot name="title">
            {{ __('Add New Group') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the require gorup information to create a valid group.') }}

            <div class="mt-3" x-data="{}"
                x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.g_name.focus(), 250)">
                <x-input type="text" class="mt-1 block w-100" autocomplete="current-password"
                    placeholder="{{ __('Enter your group name') }}" x-ref="g_name" wire:model="g_name"
                    wire:keydown.enter="createInstantGroup" />

                <x-input-error for="g_name" class="mt-2" />
            </div>

            <div class="mt-2">
                <input type="file" class="block w-1/4 file form-control form-file">
            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmingLogout')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ms-3 btn btn-md btn-success" wire:click="createInstantGroup" wire:loading.attr="disabled">
                {{ __('Create One') }}
            </button>
        </x-slot>
    </x-dialog-modal>


    {{-- edit instant gorup modal --}}
    <x-dialog-modal wire:model.live="confirmEditModal">
        <x-slot name="title">
            {{ __('Update Your Group') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the require gorup information to update.') }}

            <div class="mt-3" x-data="{}">

                <x-input type="text" class="mt-1 block w-100" auto-focus="false" aria-autocomplete="false"
                    wire:model="edit_group.name" wire:keydown.enter="updateInstantGroup" />

                <x-input-error for="g_name" class="mt-2" />
                {{-- {{ $edit_group['name'] }} --}}

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmEditModal')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ms-3 btn btn-md btn-success" wire:click="updateInstantGroup" wire:loading.attr="disabled">
                {{ __('Create One') }}
            </button>
        </x-slot>
    </x-dialog-modal>

    {{-- add member to group modal  --}}
    <x-dialog-modal wire:model.live="confirmMemberAddModal">
        <x-slot name="title">
            {{ __('Add Member To Your Group ') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">
            <div x-data="{ get: 0, isShowSearch: true }">

                <div class="p-2 d-flex align-items-center">
                    <input type="radio" x-model="get" value="0" id="get_one"
                        style="width;25px; height:20px; margin-right:10px; ">
                    <label class="m-0 ms-2" for="get_one">Single Instance</label>
                    <input type="radio" x-model="get" value="1" id="get_two"
                        style="width;25px; height:20px; margin-left:20px; margin-right:10px ">
                    <label class="m-0 ms-2" for="get_two">Multiple Instance</label>
                </div>
                <hr>

                <div x-show="get == 0" x-transition>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="memberId">Select A Member :</label>
                            <select wire:model="memberGroup" id="memberId" class="form-control">
                                <option value=""> -- select a member -- </option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}"> {{ $member->name }} </option>
                                @endforeach
                            </select>

                            <div class="mt-2 p-2 d-flex align-items-center">
                                <input type="checkbox" name="" id="" value="1"
                                    style="width:20px; hieght:25px; margin-right:10px">
                                <label class="m-0" for="">Made him as moderator</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="rounded py-3 border border-primary">
                                <img src="" class="rounded-circle"
                                    style="width:70px; height:70px; margin: 5px auto;" alt="">

                                {{-- <p>{{ $members[memberGroup]->name }}</p> --}}
                                <p>Email </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- multiple instance --}}
                <div x-show="get == 1" x-transition>
                    <div class="row m-0">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label>Select Member from bellow </label>
                                <button class="btn btn-outline-info btn-sm "
                                    x-on:click="isShowSearch = !isShowSearch"><i class="fas fa-search"></i></button>
                            </div>

                            {{-- search  --}}
                            <input x-show="isShowSearch" type="search" placeholder="search group"
                                wire:model="groupSearchVal" wire:change="groupSearch" id="groupSearch"
                                class="form-control form-search mb-1">

                            {{-- member  --}}
                            @foreach ($members as $member)
                                <div class="d-flex align-items-center rounded border mb-1 p-2">
                                    <input type="checkbox" wire:model="memberGroup" id="member_{{ $member->id }}"
                                        value="{{ $member->id }}"
                                        style="width:20px; height:20px; margin-right:10px">
                                    <div>
                                        {{ $member->name }}
                                    </div>
                                    <span> <i class="fas fa-caret-right mx-3"></i> </span>
                                    <div>
                                        {{ $member->email }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="rounded py-3 border border-primary">
                                <img src="" class="rounded-circle"
                                    style="width:70px; height:70px; margin: 5px auto;" alt="">

                                <p>Name</p>
                                <p>Email </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmMemberAddModal')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ms-3 btn btn-md btn-success" wire:click="addMemberToGroup" wire:loading.attr="disabled">
                {{ __('Insert') }}
            </button>
        </x-slot>
    </x-dialog-modal>

</div>
