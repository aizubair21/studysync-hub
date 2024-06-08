 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Studysync-hub</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dash</a></li>
                     {{-- <li class="breadcrumb-item"><a href="{{ route('vendorGroup.index') }}">Groups</a></li>
                     <li class="breadcrumb-item"><a href="#">Show</a></li>
                     <li class="breadcrumb-item active">{{ $group->name }}</li> --}}

                     {{ $slot }}
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
