<aside class="main-sidebar elevation-4 mt-1 bg-light">
    <!-- Sidebar -->
    <div class="sidebar">

        @if (request()->routeIs('administrator-dashboard'))
            <div class="p-2 mx-auto text-center">
                <img src="{{ asset('media/studysync-hub.jpg') }}"
                    style="width:70px; height:70px; margin:0 auto; border-radius:50%;" alt="">
                <h4 class="h4">{{ auth()->user()->name }}</h4>
                <h6 class="h6 border bg-success rounded p-2 ">{{ auth()->user()->email }}</h6>
            </div>
        @else
            <div class="p-2 mx-auto text-center">
                <h4 class="h4">{{ auth()->user()->name }}</h4>
                <h6 class="h6 border bg-success rounded p-2 ">{{ auth()->user()->email }}</h6>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- role management --}}
                @if (request()->routeIs('adminRole.*'))
                    <li class="nav-item menu-is-opening menu-open ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                Role Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('adminRole.index') }}"
                                    class="nav-link @if (request()->routeIs('adminRole.index')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roll</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addRoleModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#assignRoleModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Role</p>
                                </a>
                            </li>


                            {{-- permisstion --}}
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('adminPermission.index') }}"
                                    class="nav-link @if (request()->routeIs('adminPermission.index')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addPermissionModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#assignPermissionToUserModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- permission manage --}}
                @if (request()->routeIs('adminPermission.*'))
                    <li class="nav-item menu-is-opening menu-open ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                Permission Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        {{-- permisstion --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('adminPermission.index') }}"
                                    class="nav-link @if (request()->routeIs('adminPermission.index')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addPermissionModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#assignPermissionToUserModel"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- user management  --}}
                @if (request()->routeIs('adminVandor.*'))
                    <li class="nav-item menu-is-opening menu-open active">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('adminVandor.index') }}"
                                    class="nav-link @if (request()->routeIs('adminVandor.index')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Total User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('adminVandor.create') }}"
                                    class="nav-link @if (request()->routeIs('adminVandor.create')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <hr>

                <li class="nav-item menu-is-opening menu-open active">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Notice
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Notice</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Notice</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
