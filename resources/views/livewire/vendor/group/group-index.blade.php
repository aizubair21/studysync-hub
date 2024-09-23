<div >

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

    <div class="p-4 flex justify-between items-center bg-white">
        <div class="font-bold text-xl">
            Your Group
            <div class="text-sm font-normal">
                {{count($groups) > 0 ? count($groups) . " Groups"  : "No group were found !" }}
            </div>
        </div>

        <div class="flex items-center">
            <x-dropdown aling="right" >
                <x-slot name="trigger">
                    <button class="px-3 py-1  text-md">View </button>
                </x-slot>

                <x-slot name="content">
                    <div class="px-1 w-full">
                        <button class="px-3 py-2 w-full text-start text-md hover:bg-gray-100 rounded">
                            Assending
                        </button>
                    </div>
                    <div class="px-1 w-full">
                        <button class="px-3 py-2 w-full text-start text-md hover:bg-gray-100 rounded">
                            Desending
                        </button>
                    </div>
                    <hr class="my-1">


                </x-slot>
            </x-dropdown>

            <button class="px-3 py-1 text-start text-md hover:bg-green-700 bg-green-900 font-bold text-white " wire:click="$toggle('confirmingLogout')">
                Add
            </button>
        </div>
    </div>

    <div x-data="{ isShowAddModal: false }" class="px-4 py-2">

        {{-- table view toggle buton --}}
        <div class="flex justify-between items-center py-2 hidden">
            <div>
                <input type="search" placeholder="search group" wire:model="groupSearchVal" wire:change="groupSearch"
                    id="groupSearch" class="border-0 outline-0 rounded">
            </div>
            {{-- <button wire:click="$toggle('confirmingLogout')" type="button"
                    title="create a new instant group" class="px-3 py-2 rounded bg-gray-900 text-white hover:bg-gray-700 transition">
                    New
                </button> --}}

            <x-dropdown aling="right" maxWidth="24">
                <x-slot name="trigger">
                    <button class="px-3 py-2 rounded bg-white shadow text-md font-bold">More</button>
                </x-slot>

                <x-slot name="content">
                    <div class="px-1 w-full">
                        <button class="px-3 py-2 w-full text-start text-md hover:bg-gray-100 rounded" wire:click="$toggle('confirmingLogout')">
                            Add Group
                        </button>
                    </div>
                    <hr class="my-1">
                    <div class="px-1 w-full">
                        <button class="px-3 py-2 w-full text-start text-md hover:bg-gray-100 rounded" wire:click="$toggle('confirmingLogout')">
                            Add Group
                        </button>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
        {{-- table view toggle button  --}}

        {{-- header  --}}
        {{-- <div class="mx-2 flex justify-between oveflow-s-scroll">
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
                
            </div>
        </div> --}}
        {{-- ./header  --}}

        {{-- table  --}}
        <div class="">

        
            <div class="grid md:grid-cols-2 xl:grid-cols-3">
                @foreach ($groups as $group)
                    {{-- <div class="col-md-6 col-lg-4 rounded overflow-hidden p-2">
                        <table class="table bg-none  my-3 px-3 bg-transparent shadow rounded">
                            <tbody>
                                <tr>
                                    <td style="width:100px">
                                        <img src="{{ asset('media/awm.jpg') }}" alt="" class="rounded-full"
                                            style="width:70px; height:70px">
                                    </td>
                                    <td style="text-align:start!important">
                                        <div class="flex items-center">
    
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
                    </div> --}}

                    <div class="my-1 p-1 w-full">
                        {{-- <div class="xl:px-3 xl:py-4 rounded flex items-center w-full bg-white">

                        </div> --}}
                        <div class="xl:px-3 xl:py-4 p-2 rounded flex items-start w-full bg-white">
                            <div class="h-full px-2 font-bold block  border-r text-lg">
                                {{ $loop->iteration }}
                            </div>

                            <div class="px-3 w-full">

                                <div class="flex items-center justify-between w-full ">
                                    <div class="md:flex  items-center justify-between lg:block">

                                        <a title="{{$group->name}}" wire:navigate href="{{route('vendorGroup.show', ['gpid' => $group->id])}}" class="block text-start font-bold text-lg ">
                                            <!-- exam name  -->
                                            {{ Str::substr($group->name, 0, 15)  }}
                                        </a>

                                        <div class="flex justify-between items-start md:items-center text-sm">
                                            <div class="mx-2 hidden md:block lg:hidden">|</div>
                                            <div>{{ \Carbon\Carbon::parse($group->created_at)->diffForHumans() }}</div>
                                            
                                            <div class="mx-1 md:mx-2 ">|</div>
                                            <div class="px-1 rounded bg-gray-300">
                                                {{ $group->is_private ? 'Private' : '  Public' }}
                                            </div>

                                            <!-- <div class="rounded-full px-2 border  mx-2 bg-green-900 text-white "> Draft
                                            </div> -->
                                        </div>

                                    </div>

                                    <div class="" style="align-self: flex-start">

                                        <x-dropdown align="right" width="24">
                                            <x-slot name="trigger">
                                                <button class="px-2 py-1 rounded border">
                                                    More
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Select</a>
                                                </div>
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Bann</a>
                                                </div>
                                                <hr class="my-1">
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Edit </a>
                                                </div>
                                                <div class="px-1 w-full text-md">
                                                    <button class="px-3 py-2 block rounded w-full text-md text-start" wire:click="destroySingle({{$group->id}})"> Delete </button>
                                                </div>
                                                <hr class="my-1">
                                                <div class="px-1 w-full text-md">
                                                    <button class="px-3 py-2 block rounded w-full text-md "> Schedule </button>
                                                </div>
                                            </x-slot>
                                        </x-dropdown>

                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="flex justify-start items-center">
                                    
                                    <div class=" bg-green-900 text-white inline-flex">
                                        <div class="px-2">15 - E</div>
                                    </div>
                                    
                                    <div class="mx-1 bg-gray-900 text-white inline-flex">
                                        <div class="px-2">{{count($group->students)}} - S</div>
                                    </div>
                                
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        {{-- table  --}}

    </div>

    <!-- add instant group Modal -->
    <x-modal wire:model.live="confirmingLogout" height="auto" maxWidth="sm">
        <div class="px-3 py-2 text-lg font-bold">
            Add New Group
        </div>
        <hr class="my-1">

        <div class="px-3 py-5 content">
            <div>
                Please enter the require gorup information to create a valid group.
            </div>

            <div class="mt-3" x-data="{}"
                x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.g_name.focus(), 250)">
                <x-input type="text" class="mt-1 block rounded-0 w-full p-2 border-b focus:border-green-900 focus:outline-0" autocomplete="false"
                    placeholder="{{ __('Group Name') }}" x-ref="g_name" wire:model="g_name"
                    wire:keydown.enter="createInstantGroup" />

                <x-input-error for="g_name" class="mt-2" />
            </div>

            {{-- <div class="mt-2">
                <input type="file" class="block w-1/4 file form-control form-file">
            </div> --}}
        </div>
        <hr class="my-1">
        <div class="px-3 py-2 text-end">
            <button class="bg-gray-200 px-3 py-1 rounded" wire:click="$toggle('confirmingLogout')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ml-2 px-3 py-1 rounded bg-green-900 text-white" wire:click="createInstantGroup" wire:loading.attr="disabled">
                {{ __('Create') }}
            </button>
        </div>
    </x-modal>


    {{-- edit instant gorup modal --}}
    <x-dialog-modal wire:model.live="confirmEditModal">
        <x-slot name="title">
            {{ __('Update Your Group') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the require gorup information to update.') }}

            <div class="mt-3" x-data="{}">

                <input type="text" class=" w-100 p-2" auto-focus="false" aria-autocomplete="false"
                    wire:model="edit_group.name" wire:keydown.enter="updateInstantGroup" />

                <x-input-error for="g_name" class="mt-2" />
                {{-- {{ $edit_group['name'] }} --}}

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="px-2 py-1 rounded bg-gray-100" wire:click="$toggle('confirmEditModal')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ms-3 px-2 py-1 bg-green-900 text-white rounded" wire:click="updateInstantGroup" wire:loading.attr="disabled">
                {{ __('Create') }}
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

                <div class="p-2 flex items-center">
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

                            <div class="mt-2 p-2 flex items-center">
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
                            <div class="flex items-center justify-between mb-1">
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
                                <div class="flex items-center rounded border mb-1 p-2">
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
