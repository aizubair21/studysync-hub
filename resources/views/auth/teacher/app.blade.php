<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Instructor section | {{ $title ?? '' }}
    </title>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(['resources/js/app.js']) --}}

    @livewireStyles
</head>

<body>

    <style>
        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            background-color: lightgray;
        }

        .spin {
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-style: solid;
            border-width: 8px;
            border-color: darkgray, darkgray, darkgray, transparent;
            animation: spin 2s linear infinite;
            /* border-radius: 50%; */
        }

        .table td,
        .tabl th {
            verticle-align: middle !important;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg)
            }
        }
    </style>

    <div class="spinner">
        <div class="spin"></div>
    </div>

    @include('navigation-menu')

    <div class="hold-transition sidebar-mini layout-fixed text-sm">

        {{-- wrapper --}}
        <div class="wrapper">

            <!-- Main Sidebar Container -->

            <aside class="main-sidebar sidebar-dark-primary elevation-4 mt-1">
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('instructor-dashboard') }}"
                                    class="nav-link @if (Route::currentRouteName() == 'teacher_control') active @endif ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>

                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            </li>
                            <hr>

                            {{-- group management --}}
                            @if (request()->routeIs(['vendorGroup.*']))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Group Management
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorGroup.index') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>List all groups</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorGroup.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create a group</p>
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                        <a wire:navigate href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add student to group</p>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a wire:navigate href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Change student group</p>
                                        </a>
                                        </li> --}}
                                    </ul>
                                </li>
                            @endif

                            {{-- member management  --}}
                            @if (request()->routeIs(['vendorMember.*']))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Members
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorMember.index') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All Member</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorMember.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Member</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            {{-- supervisor management  --}}
                            @if (request()->routeIs(['vendorSupervisor.*']))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-eye"></i>
                                        <p>
                                            Supervisor
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorSupervisor.index') }}"
                                                class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All supervisor</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorSupervisor.create') }}"
                                                class="nav-link">
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
                            @endif

                            {{-- exam schedule management  --}}
                            @if (request()->routeIs(['vendorExamSchedule.*']))
                                <li class="nav-item  menu-is-opening menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Question and Exams
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorExamSchedule.index') }}"
                                                class="nav-link @if (request()->routeIs(' vendorExamSchedule.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>List Schedule</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a wire:navigate href="{{ route('vendorExamSchedule.create') }}"
                                                class="nav-link @if (Route::currentRouteName() == 'vendorExamSchedule.create') active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create Schedule</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a wire:navigate href=""
                                                class="nav-link @if (Route::currentRouteName() == ' teacherExamPublished.index') active @endif ">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>All Live exams</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a wire:navigate href=""
                                                class="nav-link @if (Route::currentRouteName() == 'teacherPendingExam.index') active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All Pending exams</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a wire:navigate href=""
                                                class="nav-link @if (Route::currentRouteName() == ' teacherExam.past') active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>View past exams</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif



                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Exam Result
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
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


                            <li class="nav-item">
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
            {{-- Main sidebar container --}}

            {{-- ----------------------------- Content start -------------------------- --}}
            @yield('content')
            {{-- ----------------------------- Content end -------------------------- --}}

        </div>
        <!-- ./wrapper -->

    </div>

    @livewireScripts
    @stack('script')
    <script>
        $("#dataTable").dataTable();
    </script>
</body>

</html>
