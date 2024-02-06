@extends('auth.teacher.teacher')
@section('title')
    Student View > Teacher Control
@endsection
@section('content')
<div class="content-wrapper p-2">
<div class="w-100 d-flex p-2 justify-content-between align-items-center">
    <div>
        <h6>Total Student</h3>
        </div>
        <a href="{{ route('teacherStudent.create') }}" class="btn btn-info btn-sm ">Add Student</a>
    </div>
    <p>
        You have purches <strong class="text text-info px-2 border bordered-1"> {{ Auth::user()->c_id }} </strong > student's plan. You have total <strong  class="text text-info px-2 border bordered-1"> {{ DB::table('users')->where('m_id',Auth::id())->where('is_role','2')->count() }} </strong> students.
    </p>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="my-3 d-flex">
            <div class="p-2">
                Filter
            </div>
                <select name="targetGroup" class="form-control form-select"  id="targetGroup" onchange="refreshAjux()">
                    @foreach ($groups as $gp)
                    <option value="{{ $gp->id }}" >{{ $gp->gp_name }}</option>
                    @endforeach
                </select>
            <button class="btn" onclick="getGroupWithUser()">
                <i class="fas fa-sync"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered" id="dataTables"> 
<thead>
    <tr>
        <th>#</th>
        <th>S Id</th>
        <th>Date</th>
        <th>Student username</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Phone</th>
        <th>Group</th>
        <th>Modify</th>
    </tr>
</thead>
<tbody id="tbody">
</tbody>
</table>
</div>

@push('script')
    <script>

       function refreshAjux() {
         getGroupWithUser();
        //  console.log('test');
       }

        function getGroupWithUser() {
            let gp = document.getElementById("targetGroup").value;
            // console.log(gp);
            axios.get('{{route('teacherStudent.apiIndex')}}',{
                params: {
                    id: gp
                }
            }, {
                headers: {
                    'content-type': 'application/json',
                }
            })
                .then((res)=>{
    
                    // console.log(res.data);
                    let html = '';
                    res.data.forEach((item, index) => {
                        html += 
                        `   
                        <tr>
                            <td>${++index}</td>
                            <td>#std_${item.userId ?? ""}</td>
                            <td>${item.date} ${item.month}, ${item.year ?? ""}</td>
                            <td>${item.userName ?? ""}</td>
                            <td>${item.name ?? ""}</td>
                            <td>${item.email ?? ""}</td>
                            <td>${item.phone ?? ""}</td>
                            <td>
                                ${item.groupName ?? ""}
                                <div class="">
                                    <button onclick="deleteStudentFromGroup(${item.stdGpId})" class="btn text-danger"><i class="fas fa-minus"></i></button>
                                    <button href="" class="btn text-success"><i class="fas fa-plus"></i></button>
                                </div>    
                            </td>
                            <td>
                                <a href="delete/${item.userId}" id="delete"><i class="fas fa-trash"></i></a>
                                <a href="edit/${item.userId}" id="edit" ><i class="fas fa-edit"></i></a>
                            </td>
    
                        </tr>
                        `;
                        
                    });
    
                    document.getElementById("tbody").innerHTML = html;
                })
                .catch((err)=>{
                    console.log(err);
                })
        }

        function deleteStudentFromGroup(id) {
            // event.preventDefault();
            axios.get('dltfgp', {
                params: {
                    id: id
                }
            })
                .then((res)=>{
                    console.log(res.data);
                    if (res.data == "success") {
                        getGroupWithUser();
                    }
                })
                .catch((err)=>{
                    console.log(err);
                })
        }
        getGroupWithUser();
    </script>
@endpush

@endsection