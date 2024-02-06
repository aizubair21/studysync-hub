<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>
  @yield('title')
</title>
</head>
<body>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/><!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('public') }}/back-end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- daterange picker -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/daterangepicker/daterangepicker.css"> --}}
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> --}}
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('public') }}/back-end/dist/css/adminlte.min.css">

{{-- summernote  --}}
<link rel="stylesheet" href="{{ asset('public') }}/back-end/plugins/summernote/summernote.min.css">

{{-- sweet alert --}}
<link rel="stylesheet" href="{{ asset('public') }}/back-end/plugins/sweetalert2/sweetalert2.min.css">

{{-- toastr alert  --}}
<link rel="stylesheet" href="{{ asset('public') }}/back-end/plugins/toastr/toastr.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> --}}

{{-- data table  --}}
<link rel="stylesheet" href="{{ asset('public/back-end') }}/plugins/datatables-responsive/css/responsive.bootstrap4.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
@stack('style')
</head>

<body  class="hold-transition sidebar-mini layout-fixed text-sm sidebar-collapse">
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
              <a href="{{route('dashboard')}}" class="nav-link">Home</a>
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
              </div>
              <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
            </div>
        
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Study Progress
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                </li>

                 <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Exam
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Result</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Next Exam</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link ">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Teachers
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
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



<!-- jQuery -->
<script src="{{asset('public/back-end')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/back-end')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/back-end')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/back-end')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/back-end')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/back-end')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/back-end')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/back-end')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/back-end')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/back-end')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/back-end')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/back-end')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/back-end')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
{{-- dataTables   --}}
<script src="{{ asset('public/back-end') }}/plugins/datatables/jquery.dataTables.min.js"></script>
{{-- alert --}}
<script src="{{ asset('public/back-end/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('public') }}/back-end/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('public/back-end')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/back-end')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/back-end')}}/dist/js/pages/dashboard.js"></script>

@stack('script')
{{-- init dataTables  --}}
<script>
    
$(document).ready( function () {
    $('#dataTables').DataTable();


    // $('#dataTables_advanced').DataTable([
        
    //     buttons:[
    //         'pdf','print','xcel',
    //     ];
    // ]);

    // $("#dataTables_advanced").DataTable({
    //     "responsive": true, "lengthChange": false, "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#dataTables_simple').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
} );

// before logout showing this alert message
$(document).on('click', '#logout', function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    swall({
        title:"Are you sure wanna logout ?",
        text:"",
        icon:"warning",
        buttons:true,
        dangerMode:true,
    })
    .then((willDelete)=>{
        if (willDelete) {
            window.location.href = link;
        }else{
            swal("Not Logout");
        }
    });
});

//before delete anything showing this alert message for confirmation
$(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    swall({
        title:"Are you sure wanna Delete ?",
        text:"Once Delete, This will be Permanently Deleted !",
        icon:"warning",
        buttons:true,
        dangerMode:true,
    })
    .then((willDelete)=>{
        if (willDelete) {
            window.location.href = link;
        }else{
            swal("Not Deleted !");
        }
    });
});

// toastr alert confirm
var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000
});

@if(Session::has('smessage'))
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
    case 'info':
            Toast.fire({
            icon: 'info',
            title: "{{session('smessage')}}",
        })
        break;
    case 'success':
        Toast.fire({
            icon: 'success',
            title: "{{session('smessage')}}",
        })
        // toastr.success('success')
        break;
    case 'warning':
            Toast.fire({
            icon: 'warning',
            title: "{{session('smessage')}}",
        })
        break;
    case 'error':
            Toast.fire({
            icon: 'warning',
            title: "{{session('smessage')}}",
        })
        break;

    default:
            Toast.fire({
            icon: 'info',
            title: "{{session('smessage')}}";
        })
        break;
}
@endif
@if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
    case 'info':
        toastr.info("{{Session::get('message')}}");
        break;
        case 'success':
        toastr.success("{{Session::get('message')}}");
        break;
    case 'warning':
        toastr.warning("{{Session::get('message')}}");
        break;
    case 'error':
        toastr.error("{{Session::get('message')}}");
        break;

    default:
        toastr.info("{{Session::get('message')}}");
        break;
}
@endif


</script>
</body>
</html>