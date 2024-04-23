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
    <div class="content-wrapper py-2 px-4">
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}


        {{-- create form --}}
        <div class="px-2">
            <form wire:submit.prevent="store">
                <div class="card shadow">
                    <div class="card-header py-4 fs-3">
                        <h4 class="md:w-3/4 my-1 font-md">
                            Create Form
                        </h4>
                        <p class="fs-6">
                            Create new student/member/parent/guardian as well
                        </p>
                        <div class="lg:w-1/4 my-1">
                            <a wire:navigate href="{{ route('vendorMember.index') }}"
                                class="btn btn-sm btn-outline-info me-2"> <i class="fas fa-arrow-left me-2"></i> Back</a>
                            <button class="btn btn-primary btn-md "> <i class="fas fa-arrow-right me-1 "></i> Excel
                                Import
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            {{-- left column --}}
                            <div class="col-md-6">
                                <div class="row m-0">

                                    {{-- user name --}}
                                    <div class="col-sm-7">
                                        <label for="username" class="from-label">Username :</label>
                                        <input type="text" placeholder="Jodn Doe / ICT Village / Knowledge academy"
                                            wire:model.live="username" id="username"
                                            class="form-control @error('username') is-invalid  @enderror"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        @else
                                            <div class="form-text">
                                                Username consider as the members unique identity. Or name of the member
                                                instutuions.
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- role --}}
                                    <div class="col-sm-5">
                                        <label for="is_role" class="form-label">Role :</label>
                                        <select wire:model="role" id="is_role"
                                            class='form-control py-2  @error('role') is-invalid @enderror'>
                                            <option value="">-- Select a role -- </option>
                                            @foreach ($allRole as $roles)
                                                <option value="{{ $roles->name }}" clas="p-2">
                                                    {{ Str()->upper($roles->name) }}
                                                </option>
                                            @endforeach
                                            </option>
                                        </select>
                                        <div class="form-text">
                                            Select your member role.
                                        </div>
                                    </div>

                                    {{-- name  --}}
                                    <div class="col-sm-7 my-2">
                                        <label for="name" class="from-label">Name :</label>
                                        <input type="text" wire:model="name" placeholder="Name of your member"
                                            id="name" class="form-control  @error('name') is-invalid  @enderror"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    {{-- gender --}}
                                    <div class="col-sm-5 my-2">
                                        <label for="gender" class="from-label">Gender :</label>
                                        <select wire:model="gender" id="gender"
                                            class="form-control form-select @error('gender') is-invalid @enderror">
                                            <option selected value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            {{-- right column --}}
                            <div class="col-md-6">

                                {{-- phone --}}
                                <div class="col-12 my-2" x-data="{ phone: '', isValid: true }">
                                    <label for="phone" class="from-label">Phone :</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="*** ********" x-model="phone"
                                            pattern= "(017|018|019|013|014|015|016|018) \d{8}" wire:model="phone"
                                            id="phone" class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}">
                                        <div class="input-group-text bg-none border-0">
                                            <i class="fas fa-info" title="rquired formate is : 010 00000000"></i>
                                        </div>
                                    </div>
                                    <div class="form-text">

                                        Enter a valid phone number.
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="col-12 my-2">

                                    <label for="email" class="from-label">Email :</label>

                                    <div class="d-flex align-items-center">
                                        <input type="email" placeholder="Enter a valid member email" accept="email"
                                            wire:model.live="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">

                                        <input type="checkbox" name="" disabled id="is_verified"
                                            title="is verified user ?" value="{{ now() }}"
                                            style="width:30px ;height:30px; margin: 0 15px">
                                    </div>
                                    @error('email')
                                        <strong class="text text-danger">{{ $message }}</strong>
                                    @else
                                        <div class="form-text">
                                            Give a running and personal emali. Account must be verified by email after
                                            login.
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card body 1 end --}}
                </div>


                {{-- card two start  --}}
                <div class="card shadow mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="group" class="form-label">Memer Group:</label>
                                <div class="input-group">
                                    <select wire:model="group" id="group"
                                        class="form-control form-select @error('group') is-invalid @enderror">
                                        <option value="">-- select a group --</option>
                                        @foreach ($groups as $gp)
                                            <option value="{{ $gp->id }}">-- {{ $gp->name }} --</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="input-group-text bg-success"> <i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="form-text">
                                    Select the group. If member belongs to any group
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="text" wire:model="password" id="password"
                                        class="form-control form-password @error('password') is-invalid @enderror"
                                        min="12" placeholder="Generate an strong password">
                                    <div class="input-group-text bg-success">
                                        <button type="button" class="" title="Password generator"> <i
                                                class="fas fa-sync"></i> </button>
                                    </div>
                                    <div class="form-text">
                                        Give an strong password. or click generator icon to generate an strong passwor
                                        instant.
                                    </div>
                                </div>
                            </div>

                            {{-- /row --}}
                        </div>
                        <div class="my-2 w-100">
                            <button class="btn btn-primary btn-lg float-right"> <i class="fas fa-save me-1"></i>
                                Create</button>
                        </div>
                        {{-- /card body --}}
                    </div>
                    {{-- ./card --}}
                </div>
            </form>
        </div>
    </div>
</div>
