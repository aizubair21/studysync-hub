<aside class="main-sidebar  mt-1 shadow-none bg-white">
    {{-- elevation-4 --}}
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" wire:navigate class="brand-link margin: 0 auto"
        style="padding: 17x auto!important;">
        <img src="{{ asset('media/studysync-hub.jpg') }}" alt="Brand Logo" class="brand-image img-circle "
            style="opacity: .8">
        <span class="brand-text font-weight-light">StudySync-hub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" wire:navigate ="" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> --}}


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" wire:navigate @class([
                        'nav-link',
                        'bordere border-info' => request()->routeIs('dashboard'),
                    ])>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <hr>

                {{-- group management --}}
                <li class="nav-item @if (request()->routeIs('vendorGroup.*')) menu-is-opening menu-open @endif">
                    <a href="#" @class([
                        'nav-link',
                        'bordere border-info' => request()->routeIs('vendorGroup.*'),
                    ])>
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Group Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorGroup.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorGroup.index'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorGroup.index')) text-info @endif"></i>
                                <p>List all groups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorGroup.create') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorGroup.create'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorGroup.create')) text-info @endif"></i>
                                <p>Create a group</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorGroup.AddUser') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorGroup.AddUser'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (1 + 1) text-info @endif"></i>
                                <p>Add student to group</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="" @class(['nav-link'])>
                                <i
                                    class="far fa-circle nav-icon @if (1 + 1) text-info @endif"></i>
                                <p>Change student group</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>

                {{-- member management  --}}
                {{-- @if (request()->routeIs(['vendorMember.*']))
                @endif --}}
                <li class="nav-item @if (request()->routeIs('vendorMember.*')) menu-is-opening menu-open @endif">
                    <a href="#" @class([
                        'nav-link',
                        'bordere border-info' => request()->routeIs('vendorMember.*'),
                    ])>
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Members
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorMember.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorMember.index'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorMember.index')) text-info @endif"></i>
                                <p>All Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorMember.create') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorMember.create'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorMember.create')) text-info @endif"></i>
                                <p>Add Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorMember.request') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('vendorMember.request'),
                            ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorMember.request')) text-info @endif"></i>
                                <p>Member Request</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>

                {{-- exam schedule management  --}}
                {{-- @if (request()->routeIs(['vendorExamSchedule.*']))
                @endif --}}

                <li class="nav-item  @if (request()->routeIs('vendorExamSchedule.*')) menu-is-opening menu-open @endif">
                    <a href="#" class ='nav-link @if (request()->routeIs('vendorExamSchedule.*')) bordere border-info @endif'>
                        {{-- <a href="#" @class([
                        'nav-link',
                        ' bordere border-info' => request()->routeIs('vendorExamSchedule.*'),
                    ])> --}}
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Question and Exams
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">

                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorExamSchedule.index') }}"
                                @class([
                                    'nav-link',
                                    'active' => request()->routeIs('vendorExamSchedule.index'),
                                ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorExamSchedule.index')) text-info @endif"></i>
                                <p>List Schedule</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorExamSchedule.create') }}"
                                @class([
                                    'nav-link',
                                    'active' => request()->routeIs('vendorExamSchedule.create'),
                                ])>
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('vendorExamSchedule.create')) text-info @endif"></i>
                                <p>Create Schedule</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href=""
                                class="nav-link @if (Route::currentRouteName() == ' teacherExamPublished.index') active @endif ">
                                <i
                                    class=" far fa-circle nav-icon @if (request()->routeIs('teacherExamPublished.index')) text-info @endif"></i>
                                <p>All Live exams</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href=""
                                class="nav-link @if (Route::currentRouteName() == 'teacherPendingExam.index') active @endif">
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('teacherPendingExam.index')) text-info @endif"></i>
                                <p>All Pending exams</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href=""
                                class="nav-link @if (Route::currentRouteName() == ' teacherExam.past') active @endif">
                                <i
                                    class="far fa-circle nav-icon @if (request()->routeIs('teacherExam.past')) text-info @endif"></i>
                                <p>View past exams</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Exam Result
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">
                        <li class="nav-item">
                            <a href="public/back-end/index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Result</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="public/back-end/index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Excel Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>

                {{-- supervisor management  --}}
                {{-- @if (request()->routeIs(['vendorSupervisor.*']))
                @endif --}}
                <li class="nav-item @if (request()->routeIs('vendorSupervisor.*')) menu-is-opening menu-open @endif">
                    <a href="#" @class([
                        'nav-link',
                        'bordere border-info' => request()->routeIs('vendorSupervisor.*'),
                    ])>
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            Supervisor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorSupervisor.index') }}"
                                class="nav-link @if (request()->routeIs('vendorSupervisor.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All supervisor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vendorSupervisor.create') }}"
                                class="nav-link @if (request()->routeIs('vendorSupervisor.create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add supervisor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign supervisor to a member</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Notice
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-4">
                        <li class="nav-item">
                            <a href="{{ route('testMaster') }}" wire:navigate class="nav-link">
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
                <hr>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
