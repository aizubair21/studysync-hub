<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Administrator || {{ $title ?? "Administrator Controls" }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('style')
    @livewireStyles

  </head>

  <body  class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

      <!-- Preloader -->
      {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div> --}}
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
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-fixed mt-1">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a wire:navigate href="{{route('dashboard')}}" class="nav-link">Home</a>
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
            <form action="{{ route('logout') }}" method="post">
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a wire:navigate href="{{route("administrator-dashboard")}}" class="d-block">Admin</a>
            </div>
          </div>
      
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Vendor
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a wire:navigate href="{{route('adminVandor.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Vendor</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a wire:navigate href="{{ route('adminVandor.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New Vendor</p>
                    </a>
                  </li>
                </ul>
              </li>
            
              {{-- role management --}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-filter"></i>
                  <p>
                    Role Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a wire:navigate href="{{route('adminRole.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roll</p>
                    </a>
                  </li>

                  {{-- permisstion --}}
                  <li class="nav-item">
                    <a wire:navigate href="{{route('adminPermission.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Permission</p>
                    </a>
                  </li>
                </ul>
              </li>

              {{-- users management --}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Users
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a wire:navigate href="{{route('adminVandor.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a wire:navigate href="{{ route('adminVandor.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New Users</p>
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
