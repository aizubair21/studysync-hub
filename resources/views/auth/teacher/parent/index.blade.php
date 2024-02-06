@extends('auth.teacher.teacher')
@section('title')
    Parent View > Teacher Control
@endsection
@section('content')
<div class="content-wrapper p-2">
<table class="table table-bordered" id="dataTables"> 
<thead>
    <tr>
        <th>#</th>
        <th>Parent Id</th>
        <th>Date</th>
        <th>Month</th>
        <th>Year</th>
        <th>Parent username</th>
        <th>Parent Name</th>
        <th>Parent Email</th>
        <th>Parent Phone</th>
        <th>Modify</th>
    </tr>
</thead>
<tbody>
    @php $x = 1;  @endphp
    @foreach ($data as $parent)
    <tr>
        <td>{{ $x++ }}</td>
        <td>{{ $parent->id }}</td>
        <td>{{ $parent->date }}</td>
        <td>{{ $parent->month }}</td>
        <td>{{ $parent->year }}</td>
        <td>{{ $parent->username }}</td>
        <td>{{ $parent->name }}</td>
        <td>{{ $parent->email }}</td>
        <td>{{ $parent->phone }}</td>
        <td class="d-flex">
            <div>
            
                <a href="{{ route('teacherParent.delete', ['id'=>$parent->id]) }}" id="delete" class="text text-danger">
                    Delete
                </a>
            </div>
            <span class="px-2" > ||</span>
            {{-- <div>
                <a class="text text-info" href="{{ route('teacherParent.edit', ['id'=> $parent->id]) }}">
                    Edit
                </a>
            </div> --}}
        </td>
    </tr>   
    @endforeach
</tbody>
</table>
</div>
@endsection