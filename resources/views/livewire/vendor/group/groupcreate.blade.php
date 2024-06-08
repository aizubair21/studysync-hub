<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
    <div>
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}

        <div class="py-2">

            <a wire:navigate href="{{ route('vendorGroup.index') }}" class="btn btn-outline-primary btn-sm"> <i
                    class="fas fa-arrow-left me-2"></i>
                Back </a>
        </div>

        {{-- create form --}}
        <form wire:submit.prevent="store">
            <div class="row justify-content-center align-items-cneter">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-caret-right me-2"></i> Create A New Group
                        </div>
                        <div class="card-body ">
                            <label for="name" class="">Group Name : </label>

                            <input type="text" id="name" wire:model.live="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Group Name..">
                            <div class="form-text">
                                Give a unique group name to introduce your group to everyone.
                            </div>
                            @error('name')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-caret-right me-2"></i> Group Description
                        </div>
                        <div class="card-body">
                            <textarea wire:model="description" id="description" rows="5" class="form-control"
                                placeholder="Descrive about your group"></textarea>
                        </div>
                    </div>

                </div>

                {{-- description --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-caret-right me-2"></i>Group Info
                        </div>
                        <div class="card-body" x-data="{ addGroupMember: true }">
                            <div class="row">
                                <div class=" col-md-6">


                                    <div class=" mb-2">

                                        <div class="d-flex justify-content-start align-items-center">
                                            <input type="checkbox" name="" id="private" value="private"
                                                style="width:25px; height:25px; horizontal-align:middle; margin-right:15px;">
                                            <label for="private">Group Is Private ?</label>
                                        </div>
                                        <hr>

                                        <div class="d-flex justify-content-start align-items-center">
                                            <input type="checkbox" name="" id="muted" value="muted"
                                                style="width:25px; height:25px; horizontal-align:middle; margin-right:15px;"
                                                value="0">
                                            <label for="muted">Is Muted ?</label>
                                        </div>
                                        <hr>

                                        <div x-data={temp:false}>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="checkbox" x-model="temp" name="" id="terporary"
                                                    value="terporary"
                                                    style="width:25px; height:25px; horizontal-align:middle; margin-right:15px;"
                                                    value="4">
                                                <label for="terporary">Create for temporary used ?</label>
                                            </div>
                                            <div x-show="temp" class="p-3 shadow-sm mt-3">
                                                <label for="banned_date"> Active until </label>
                                                <input type="date" name="" id="banned_date"
                                                    class="form-control form-date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class="mt-3">
                                        <img src="" alt="" style="object-fit:cover ">
                                        <label for="image">Pick a group image :</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control form-file">
                                    </div>

                                </div>
                            </div>
                            <hr>

                            <button x-on:click="addGroupMember = !addGroupMember" class="btn btn-md btn-outline-info"
                                type="button"> <i class="fas fa-plus me-2"></i>
                                Add Member
                            </button>

                            <div x-show="addGroupMember" class="shadow py-3 px-2 mt-1" x-data="{ items: 10 }">
                                <div x-for="item in items" class="d-flex align-items-center p-2 border-bottom">

                                    <input type="checkbox" wire-model="selectedMemberForGroup" id="user_1"
                                        value="1" class="me-2">

                                    <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                        style="width:35px; height:35px; margin-right:5px">

                                    <label for="user_1" class="m-0 pe-2">User Name</label>
                                    <span class="fas fa-caret-right mx-2"></span>

                                </div>
                            </div>

                            <hr>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <button class="btn btn-lg btn-success float-right"> <i class="fas fa-save"></i>
                                    Create</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>
</div>
