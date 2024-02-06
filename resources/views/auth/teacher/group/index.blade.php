@extends('auth.teacher.teacher')
@section('title')
    Student Group View > Teacher Control
@endsection
@section('content')
<div class="content-wrapper p-2">
<div class="w-100 d-flex justify-content-between align-items-center">
    
    <h6>Total Group</h3>
    <a href="{{ route('teacherStudentGroup.create') }}" class="btn btn-info btn-sm ">New Group</a>
</div>
<hr>

{{-- <strong class="text text-danger">{{
    Session::get('message')
}}</strong> --}}

{{-- <pre>
    @php print_r($data); @endphp
</pre> --}}

<div class="row justify-content-between" >
    <div class="col-md-6">
        <div class="card">
            <div class="w-100 p-2 fs-2" >
                <h5>Student with group</h4>
                    <hr>
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="dataTables2"> 
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Group Name</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $x = 1;
                        @endphp
                        @foreach ($data as $user)
                        <tr>
                                
                            <td>{{ $x++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->gp_name }}</td>
                            <td class="d-flex">
                                <div>
                                    <form action="{{ route('deleteUserFromGroup.destroy', ['id'=>$user->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm ">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="w-100 p-2 fs-2" >
                <h5>Group and Student count</h4>
                    <hr>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTables"> 
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Group Name</th>
                            <th>Student</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $x = 1;
                        @endphp
                        @foreach ($std_group as $group)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $group->gp_name }}</td>
                            <td>
                                {{ 
                                
                                    DB::table('std_group')->where('m_id', $group->gp_modaretor)->where('g_id', $group->id)->count();
                                }}
                            </td>
                            <td class="d-flex">
                                <div>
                                    <form action="{{ route('teacherStudentGroup.destroy', ['id'=>$group->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm ">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection