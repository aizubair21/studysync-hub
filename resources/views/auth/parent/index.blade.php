@extends('auth.parent.parent')
@section('title')
    Teacher Section
@endsection

@section('content')
<div class="content-wrapper p-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Hello, Dear {{ Auth::user()->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Your Child</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@isset($children)
@if ($children->count() < 1)
    <div class="alert alert-warning"> 
        Please, be patient. We are adding your child with you.
    </div>  
@else
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid border-0"
                            src="{{ asset('storage/image/default.png') }}"
                            alt="User profile picture"class="img" >
                    </div>

                    <h3 class="profile-username text-center">{{ $children[0]->name }}</h3>

                    <p class="text-muted text-center">
                        {{
                            Str::upper($group->gp_name)
                        }} 
                        Group
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Total Exam </b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Attend Exam </b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                    </ul>

                    <button class="btn btn-primary btn-block"><b>Regular</b></button>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Notice </a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Exam Shedules </a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        
                        {{-- notice --}}
                        @php
                            $notice = DB::table('notice')->where('modaretor', Auth::user()->m_id)->where('target_all', '2')->get();
                        @endphp
                        @foreach ($notice as $info)
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a class="btn btn-app">
                                                <i class="fas fa-bullhorn"></i> Notifications
                                            </a>
                                        </div>
                                        <div class="ml-2">
                                            <p>
                                                <strong class="text text-info"> {{ $info->title }} </strong><br>
                                                {{ $info->notice }}
        
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.user-block -->
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <div class="card d-flex">
                           
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="btn bg-info">
                                    <i class="fa-sharp fa-solid fa-marker"></i>
                                </div>
                                <div>
                                    <strong>MCQ</strong>
                                </div>
                                <div style="border-right:1px solid gray; padding:0px 10px">
                                    <strong>Math Exam - Science</strong>
                                </div>
                                <div>
                                    1 Hour
                                </div>
                                <div>
                                    100 Marks
                                </div>
                                <div>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    2022/01/12
                                </div>
                                <div >
                                    <i class="fas fa-clock"></i> 
                                    09:00 AM
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endif
@endisset
{{-- <div class="alert alert-success">
    <pre>
        {{
            print_r($children)
        }}
        {{
            print_r($notice)
        }}
    </pre>
</div> --}}
</div>
@endsection