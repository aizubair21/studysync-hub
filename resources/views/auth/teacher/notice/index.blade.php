@extends('auth.teacher.teacher')
@section('title')
    Notice view > teacher control
@endsection
@section('content')
<div class="content-wrapper p-2">
<table class="table table-hover" id="dataTables">
<thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Notice</th>
        <th>Notice For</th>
        <th>Time</th>
        <th>E/D</th>
    </tr>
</thead>
<tbody>
    @php  {{ 
        $i = 1;
        $dta = $data->where('modaretor', Auth::id());
        }} @endphp
    @foreach ($dta as $notice)
        <tr>
            <td>{{ $i ++ }}</td>
            <td>{{ $notice->title }}</td>
            <td>{{ $notice->notice }}</td>
            <td>
                @isset($notice->target_all)
                    To All Student
                @else
                    To A Group
                @endisset
            </td>
            <td> {{ date('d F Y', strtotime($notice->created_at)) }}</td>
            <td class="input-group">
                <a href="{{ route('teacherNotice.destroy', ['id'=>$notice->id]) }}" class="text text-danger" id="delete" >Delete</a>
                
            </td>
        </tr>
    @endforeach
</tbody>
</table>
</div>


{{-- notice edit moda --}}
@endsection