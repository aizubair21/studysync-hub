@extends('auth.teacher.teacher')
@section('title')
    Group Add > Teacher Control
@endsection
@section('content')
<div class="content-wrapper px-2">
    <div class="row">
        <div class="col-md-6">
            
            {{-- create a new group --}}
            <div class="card mt-2">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Create New Group
                    </div>
                        <a href="{{route('teacherStudentGroup.index')}}" class="btn btn-primary btn-sm ">All Group</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacherStudentGroup.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-9">
                                <input type="hidden" name="modaretor" value="{{ Auth::id()}}">
                                <label for="name" class="from-label">Group Name :</label>
                                <input type="text" name="groupname" id="name" placeholder="Science, Arth, Math-group" class="form-control  @error('groupname') is-invalid  @enderror"  value="{{ old('groupname') }}">
                                
                            </div>
                            <div class="col-3">
                                <label for="target">Student Target :</label>
                                <input type="number" name="target" placeholder="50" class="form-control">
                            </div>
                            <div class="col-12 mt-3 w-100" >
                                <button class="btn btn-primary btn-lg float-right" >Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            {{-- list all group --}}
            <div class="card mt-2">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            All Group
                        </div>
                        {{-- <a href="{{route('teacherStudentGroup.index')}}" class="btn btn-primary btn-sm ">Insert Multiple</a> --}}
                    </div>
                </div>
                <div class="car-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>
                                Dt
                            </th>
                            <th>Tar</th>
                            <th>Std</th>
                            <th>D/E</th>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach ($allGroup as $grp)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $grp->gp_name }}</td>
                                    <td>{{ date("d M, Y", strtotime($grp->created_at)) }}</td>
                                    <td>{{ $grp->gp_target }}</td>
                                    <td>{{ DB::table('std_group')->where('m_id', $grp->gp_modaretor)->where('g_id', $grp->id)->count() }}</td>
                                    <td>
                                        <a href="{{route("teacherStudentGroup.destroy",["id"=>$grp->id])}}" id="delete" class="text-danger"><i class="fas fa-trash"></i></a>
                                        <a href="#" id="eidt" class="text-info"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div>
                <div class="card mt-2">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                Insert Student To Group
                            </div>
                            {{-- <a href="{{route('teacherStudentGroup.index')}}" class="btn btn-primary btn-sm ">Insert Multiple</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
        
                            @php  
                                // $grp = DB::table('groups')->where('gp_modaretor', Auth::id())->get();
                            @endphp
                            <form action="{{ route('setStudent.store') }}" method="post">
                                @method('post')
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <div class="">
                                    <div class="w-100">
                                        <label for="group">Select Group :</label>
                                        <select name="g_id" id="group" class="form-control">
                                            <option value="">Select Group </option>
                                            @foreach ($allGroup as $item)
                                                <option value="{{ $item->id }}">{{ $item->gp_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label for="select">Select Student :</label>
                                        <select name="s_id[]" id="select" select-multiple='true' multiple class="form-select">
                                            <option value="">Select student</option>
                                            @foreach ($std as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }} -> {{ $group->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="mt-3 w-100"> 
                                    <button type="submit" class="btn btn-info btn-lg float-right">Insert</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection