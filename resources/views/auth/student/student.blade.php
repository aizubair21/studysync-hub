<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
{{-- <link rel="stylesheet" href="{{asset('public')}}/back-end/css/style.css"> --}}
<title>
  @yield('title')
</title>
</head>

{{-- google fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet"><!-- Font Awesome Icons -->

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" > --}}
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"><!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('public') }}/back-end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- daterange picker -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/daterangepicker/daterangepicker.css"> --}}
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
<!-- Select2 -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/select2/css/select2.min.css"> --}}
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> --}}
<!-- Bootstrap4 Duallistbox -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"> --}}
<!-- BS Stepper -->
{{-- <link rel="stylesheet" href="{{asset('public/back-end')}}/plugins/bs-stepper/css/bs-stepper.min.css"> --}}
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
<body>
<style>
  html {
    overflow-x: hidden;
  }
  body {
    overflow-x: hidden;
    font-family:"Nunito", sans-serif;
  }
 * {
  box-sizing: border-box
 }
  .side_nav {
    background-color: #2CC26B;
    padding:10px 0px;
    text-align:left;
    position: fixed;;
    left: 0;
    top: 0;
    z-index: 99999;
    height: 100vh;
  }
  .mainContent {
    padding-left: 85px;
    padding-top: 10px;
    padding-right: 30px;
  }
  .side_nav ul {
    margin: 0;
    padding: 0;
  }
  .side_nav ul li {
    list-style-type: none;
  }
  .side_nav ul li a {
    text-decoration: none;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }
  .side_nav ul li a img {
    width: 25px;
    height: 25px

  }
  .side_nav .image {
    border-radius: 50%;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;;
  }
  .side_nav .image img {
    border-radius: 50%;
  }
  .active {
    background-color: #0D6934;
    padding: 15px;
  }


  
  @media (max-width:992px){
    .side_nav {
      position: fixed;
      top: 89%;
      left: 0;
      width: 100%;
      height: auto;
      z-index: 9999;;
    }

    .side_nav .image {
      display: none;
    }
    .side_nav ul {
      display: flex;
      justify-content: space-around;
      align-items: center
    }
    .active {
      padding: 8px;
    }
    
    .side_nav ul li:nth-child(1) {
      order: 3;
    }
    .side_nav ul li:nth-child(2) {
      order: 1;
    }
    .side_nav ul li:nth-child(3) {
      order: 2;
    }
    .side_nav ul li:nth-child(4) {
      order: 4;
    }
    .side_nav ul li:nth-child(5) {
      order: 5;
    }
    .mainContent {
     padding: 0px 10px;
     margin-bottom: 50px;
    }
  }
</style>
@stack('style') 
</head>

<body style="background-color: #FFFAED ">
  <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}
      
        <!-- Navbar -->
        <nav class="d-none main-header navbar navbar-expand navbar-white navbar-light navbar-fixed">
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
           
           

            {{-- <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li> --}}

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
        {{-- <aside class="main-sidebar">
          <div style="padding:5px;">
            <img src="{{ asset('storage') }}/image/default_boy.png" width="70" height="70" alt="">
          </div>
        </aside>
             --}}
        <div class="row p-2">
          <div class="side_nav" >
            <div class="image">

              <a href="{{ route('dashboard') }}">
                @if (Auth::user()->gender == "male")
                  {{-- <img src="{{ asset('storage') }}/image/default_boy.png" width="150" alt=""> --}}
                  <img width="40" src="{{ asset('storage') }}/image/default_boy.png"  alt="">
                  {{-- <img width="40" src="{{ asset('storage') }}/image/default_boy.png"  alt=""> --}}
                @endif
                @if (Auth::user()->gender == "femail")
                    <img  src="{{ asset('storage') }}/image/default_girl.png" width="40" alt="">
                @endif

              </a>
            </div>
            <ul>
              <li>
                <a href="{{ route('dashboard') }}" class="@if(Route::currentRouteName() == "student_panel") active @endif"> 
                  <img width="40" src="{{ asset('storage/image') }}/home_regular.svg" alt="">          
                </a>
              </li>
              <li>
                <a href="{{  route('showLiveExam') }}" class="@if(Route::currentRouteName() == "showLiveExam" || Route::currentRouteName() == 'assignToExam' ||  Route::currentRouteName() == 'studentExamReview.index') active @endif">
                  <img width="40" src="{{asset('storage/image')}}/play_regular.svg" alt="">       
                </a>
              </li>
              <li>
                <a href="{{ route('dashboard') }}">
                  <img width="40" src="{{asset('storage/image')}}/tasks_regular.svg" alt="">       
                  {{-- <i class="fa-solid fa-tasks"></i>           --}}
                </a>
              </li>
              <li>
                <a href="{{ route('dashboard') }}">
                  <img width="40" src="{{asset('storage/image')}}/bell_solid.svg" alt="">       
                  {{-- <i class="fa-solid fa-bullhorn"></i>          --}}
                </a>
              </li>
              
              <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn ">
                    <img width="25" height="25" src="{{ asset('storage/image') }}/signout_regular.svg" alt="">      
                  </button>
                </form>
        
              </li>
            </ul>
          
          </div>
          <div class="col-lg-12 mainContent">
            @yield('content')
          </div>
        </div>
        
        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->





      <!-- jQuery -->

</body>
<script src="{{asset('public/back-end')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/back-end')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->7
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

<script src="{{asset('public/back-end')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
{{-- <script src="{{asset('public/back-end')}}/plugins/chart.js/Chart.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Sparkline -->
{{-- <script src="{{asset('public/back-end')}}/plugins/sparklines/sparkline.js"></script> --}}
<!-- JQVMap -->
{{-- <script src="{{asset('public/back-end')}}/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
{{-- <script src="{{asset('public/back-end')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{asset('public/back-end')}}/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{asset('public/back-end')}}/plugins/moment/moment.min.js"></script> --}}
{{-- <script src="{{asset('public/back-end')}}/plugins/daterangepicker/daterangepicker.js"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{asset('public/back-end')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<!-- Summernote -->
<script src="{{asset('public/back-end')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{asset('public/back-end')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
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
{{-- <script src="{{asset('public/back-end')}}/dist/js/pages/dashboard.js"></script> --}}


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
@stack('script')
</html>