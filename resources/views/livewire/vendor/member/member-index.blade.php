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


    {{-- header --}}
    <div class="bg-white mb-2">

        <div class="flex items-center justify-between px-5 py-4">
            <div>
                <div class="text-xl font-bold">My Member</div>
                <div class="text-sm font-normal"> 40 members </div>
            </div>

            <div class="flex items-center">
                <button class="mx-1 bg-green-900 text-white px-3 py-1 hover:bg-green-800 transition rounded">Add</button>
                <button class="px-3 py-1"><img class="w-5 rotate-90" src="{{asset('media/ellipsis-h.png')}}" alt=""></button>
            </div>
        </div>

        <div class="flex items-center justify-center border-b w-full">
            <button class="px-3 py-1 mx-1 border-5 border-b border-green-700 text-green-700 font-bold bg-green-50">Summery</button>
            <button class="px-3 py-1 mx-1">Individual</button>
            <button class="px-4 py-1 font-md">Settings</button>
        </div>

    </div>
    {{-- header --}}

    <div class="flex justify-center items-start">
        
        <div class="rounded p-2" style="width: 100%; max-width:570px; margin: 0 auto">
            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    
            <div class="rounded bg-white ">
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <select name="" id="" class="border rounded p-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="w-1 border-r"></div>
                        <input type="search" name="" class="w-full p-2 rounded border-b " placeholder="search" id="">
                    </div>
               
                    <x-dropdown aling="right">
                        <x-slot name="trigger">
                            <button class="px-3 py-1 rounded ">more </button>
                        </x-slot>
            
                        <x-slot name="content">
                            <div class="px-1">
                                <button class="text-start p-2 hover:bg-gray-100 hover:transition w-full">Delete</button>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                
                {{-- <hr class="my-1"> --}}
    
                <div class="my-2">
                    <div class="my-1 p-4 bg-white rounded flex items-center justify-between hover:bg-gray-100 hover:transition border-b">
                        <div class="flex items-center">
                            <input type="checkbox" name="" style="width:20px; height:20px" id="">
                            <div class="px-3">
                                <img class="rounded-full w-8 border border-green-700" src="{{asset("media/profile-white.png")}}" alt="">
                            </div>
                            <div class="">
                                <a href="" class="block font-bold text-md">
                                    Lorem ipsum dolor
                                </a>
                                <div class="font-normal font-xs my-0">
                                    lorem@lorem.com
                                </div>
                            </div>
                        </div>
            
                        <button class="p-2" wire:click="$toggle('showMemberAside')">
                            <img width="20" height="20" src="https://img.icons8.com/pastel-glyph/20/circled-chevron-right.png" alt="circled-chevron-right"/>
                        </button>
                    </div>
    
                    <div class="my-1 p-4 bg-white rounded flex items-center justify-between hover:bg-gray-100 hover:transition border-b">
                        <div class="flex items-center">
                            <input type="checkbox" name="" style="width:20px; height:20px" id="">
                            <div class="px-3">
                                <img class="rounded-full w-8 border border-green-700" src="{{asset("media/profile-white.png")}}" alt="">
                            </div>
                            <div class="">
                                <div class="font-bold text-md">
                                    Lorem ipsum dolor
                                </div>
                                <div class="font-normal font-xs my-0">
                                    lorem@lorem.com
                                </div>
                            </div>
                        </div>
            
                        <button class="p-2">
                            <img width="20" height="20" src="https://img.icons8.com/pastel-glyph/20/circled-chevron-right.png" alt="circled-chevron-right"/>
                        </button>
                    </div>
                </div>
    
            </div>
            
            <div class="bg-white rounded text-ms text-center font-bold p-2" >
                No Member Found!
            </div>
    
           
        </div>

        {{-- aside  --}}
        {{-- <div class="p-2 absolute top-0 left-0 w-full h-full flex items-start justify-end" style="background-color: #00000040; z-index:99999">
            <div class="rounded bg-white h-full" style="width:300px">
                <div class="p-4 text-end border-b">
                    <button wire:click="$toggle('showMemberAside')">x</button>
                </div>




            </div>
        </div> --}}

    </div>


    <x-modal-aside wire:model.live="showMemberAside">
        <div class="p-4 border-b flex items-start">
            <img class="w-12 border roundef-full border-green-700" src="{{asset("media/profile.white.png")}}" alt="">
            <div class="ps-5">
                <div class="text-sm">3 month ago</div>
                <div class="text-lg font-bold">lorem ipsum colors</div>
                <div class="text-sm">loremasdfasdf@lorem.com</div>
            </div>
        </div>

        <div class="p-4 flex item-center justify-between border-b">
            <div class="text-md font-bold">status</div>
            <select name="" id="" class="p-2 rounded border border-green-900 bg-green-50">
                <option selected value="Active">Active</option>
                <option value="Baned">Banned</option>
            </select>
        </div>

        <div class="p-4 border-b">
            <div class="text-sm mb-4 flex items-center justify-between">
                <div>Group</div>
                <a href="" class="block bg-green-900 text-white rounded-full px-2">view</a>
            </div>

            <div class="flex items-center mx-4 my-1">
                <div class="border-r px-2">01</div>
                <div class="px-2"> General Batch </div>
            </div>
            <div class="flex items-center mx-4 my-1">
                <div class="border-r px-2">01</div>
                <div class="px-2"> General Batch </div>
            </div>
            <div class="flex items-center mx-4 my-1">
                <div class="border-r px-2">01</div>
                <div class="px-2"> General Batch </div>
            </div>

            <div class="mx-4 text-end">
                <button class="px-2 rounded bg-green-50 ">Assign New</button>
            </div>
        </div>

        <div class="p-4 border-b">
            <div class="text-sm mb-4 flex items-center justify-between">
                <div>Exams</div>
                <a href="" class="block bg-green-900 text-white rounded-full px-2">view</a>
            </div>

            <div class="flex items-center mx-4 my-1">
                <table>
                    <tr>
                        <th class="p-1">Exam</th>
                        <th class="p-1">Attend</th>
                        {{-- <th></th> --}}
                    </tr>
                    <tr>
                        <td>
                            20
                        </td>
                        <td>15</td>
                    </tr>
                </table>
            </div>
        </div>


    </x-modal-aside>


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
 