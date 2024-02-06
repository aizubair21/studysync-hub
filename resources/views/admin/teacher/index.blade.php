@extends('auth.app')
@section('content')
<div class="content-wrapper p-2">
    <table class="table table-hober table-bordered" id="dataTables">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
                <th>INST or username</th>
                <th>Name </th>
                <th>Email </th>
                <th>Phone </th>
                <th>Subscription</th>
                <th>Total Student</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($teacher as $std)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $std->id }}</td>
                    <td>{{ $std->date }}</td>
                    <td>{{ $std->month }}</td>
                    <td>{{ $std->year }}</td>
                    <td>{{ $std->username }}</td>
                    <td> {{ $std->name }}</td>
                    <td> {{ $std->email }}</td>
                    <td> {{ $std->phone }}</td>
                    <td>{{ $std->c_id }}</td>
                    <td>{{ $users->where('m_id',$std->id)->where('is_role','2')->count() }}</td>
                    <td class="d-flex">
                        <div>
                            <form action="{{ route('adminUser.delete',['id' => $std->id]) }}" method="delete">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm ">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('adminUser.edit', ['id'=>$std->id]) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"> </i>
                            </a>
                        </div>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>

<!--Teacher Delecte Confirmation Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Delete ?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure want to delete this teacher ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          
        </div>
      </div>
    </div>
  </div>
@endsection