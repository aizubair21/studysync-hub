<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
  Instructor section | {{ $title ?? ""}}
  </title>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  @stack('style')
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div wire:loading style="z-index:99999; position: fixed; top:50%;left:50%">Loading... </div>

    <style>
      .spinner{
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
      .spin{
          width: 50px;
          height: 50px;
          background-color: transparent;
          border-style: solid;
          border-width: 8px;
          border-color: darkgray, darkgray, darkgray, transparent;
          animation: spin  2s linear infinite;
          /* border-radius: 50%; */
      }
      @keyframes spin {
          100% {transform:rotate(360deg)}
      }
  </style>
  <div class="spinner">
      <div class="spin"></div>
  </div>

   
    
    <div class="wrapper">

      <!-- Preloader -->
      {{-- <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-fixed">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a wire:navigate href="{{route("instructor-dashboard")}}" class="nav-link">Home</a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
            </li> --}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">



          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>

          {{-- logout  --}}
          <li class="nav-item">
            <form  action="{{ route('logout') }}" method="post">
              @csrf
              <button class="btn">
                <i class="fas fa-sign-out"></i>
              </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4 mt-1">
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
              {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


              <li class="nav-item">
                <a wire:navigate href="{{route('instructor-dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'teacher_control') active @endif ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              </li>

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
                    <a wire:navigate href="{{route("vendorMember.create")}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Member</p>
                    </a>
                  </li>
                </ul>
              </li>

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
                    <a wire:navigate href="{{route("vendorSupervisor.index")}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All supervisor</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a wire:navigate href="{{route("vendorSupervisor.create")}}" class="nav-link">
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

              {{-- <li class="nav-item @if(Route::currentRouteName() == 'teacherExamShedule.index' || Route::currentRouteName() == 'teacherExamShedule.create' || Route::currentRouteName() == 'teacherPendingExam.index' || Route::currentRouteName() == 'teacherExam.past' || Route::currentRouteName() == "teacherExamPublished.index") menu-is-opening menu-open @endif">
                <a href="#" class="nav-link @if(Route::currentRouteName() == 'teacherExamShedule.index' || Route::currentRouteName() == 'teacherExamShedule.create' || Route::currentRouteName() == 'teacherPendingExam.index' || Route::currentRouteName() == 'teacherExam.past' || Route::currentRouteName() == "teacherExamPublished.index") active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Exams
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('teacherExamShedule.create') }}" class="nav-link @if(Route::currentRouteName() == 'teacherExamShedule.create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create exam routine</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('teacherExamShedule.index') }}" class="nav-link @if(Route::currentRouteName() == 'teacherExamShedule.index') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Draft Exam</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('teacherExamPublished.index') }}" class="nav-link @if(Route::currentRouteName() == "teacherExamPublished.index") active @endif ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Live exams</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('teacherPendingExam.index') }}" class="nav-link @if(Route::currentRouteName() == 'teacherPendingExam.index') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Pending exams</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('teacherExam.past') }}" class="nav-link @if(Route::currentRouteName() == "teacherExam.past") active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View past exams</p>
                    </a>
                  </li>
                </ul>
              </li> --}}

              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Question
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('teacherQuestion.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Question</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="public/back-end/index2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Question</p>
                    </a>
                  </li>
                </ul>
              </li> --}}




              {{-- <li class="nav-item">
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
                    <a href="{{ route('teacherNotice.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New Notice</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('teacherNotice.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Notice</p>
                    </a>
                  </li>
                </ul>
              </li> --}}


            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      @yield('content')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @livewireScripts
    @stack('script')
  </body>

</html>