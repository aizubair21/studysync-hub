@extends('auth.teacher.teacher')

@section('title')
    Past Exam > Teacher Control
@endsection

@section('content')
<div class="content-wrapper p-2">
    <div class="card">
        <div class="w-100 d-flex justify-content-between align-items-center p-2" style="border-bottom:1px solid rgb(231, 231, 231)">
            <h3>
               <i class="fas fa-chart"></i> Already Teken Exam
            </h3>
            <div>
                <a href="{{route('teacherExamShedule.create')}}" class="btn btn-primary btn-md ">
                    <i class="fas fa-plus mr-2"></i> Add Routine
                </a>
            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center"> 
                            <th>#</th>
                            <th>Exam Name </th>
                            <th>Subject</th>
                            <th>Group</th>
                            <th>Start</th>
                            <th>Duration</th>
                            <th title="how many number add for single correct answer.">R</th>
                            <th title="how many number cut for single wrong answer.">W</th>
                            <th title="how many number cut for skipped a question.">S</th>
                            <th>Action</th>
                            <th>Response</th>
                            <th>E/D</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @if (count($past_exam) < 1)
                            <tr>
                                <td colspan="14"> No Data Found ! </td>
                            </tr>
                        @else
                            @foreach ($past_exam as $qsd)
                                @php 
                                    $group = DB::table('groups')->where('gp_modaretor', Auth::id())->where('id', $past_exam[0]->g_id)->first();
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $qsd->exam_name }}</td>
                                    <td>{{ $qsd->exam_subject }}</td>
                                    <td>
                                        {{
                                            $group->gp_name ?? ""
                                        }}
                                    </td>
                                    <td>{{ $qsd->exam_time }}</td>
                                    <td>{{ $qsd->total_time }} Minute</td>
                                    <td>{{ $qsd->for_correct }}</td>
                                    <td>{{ $qsd->for_incorrect }}</td>
                                    <td>{{ $qsd->for_skiped }}</td>
                                    <td >
                                        
                                            {{-- <form action="{{ route('teacherQuestion.index') }}" method="get">
                                                @method('get')
                                                <input type="hidden" id="Qid" name="routine_id" value="{{ $qsd->id }}">
                                                <input type="hidden" name="group_id" value="{{ $qsd->g_id }}">
                                                <button type="submit" class="btn btn-outline-success btn-sm">
                                                    Details
                                                </button>
                                            </form> --}}
    
                                        <button data-id="{{  $qsd->id  }}"  class="btn btn-outline-info btn-sm ">
                                            Question View 
                                        </button>
                                        {{-- <a href="{{ route('teacherExam.unpublish', ['exam'=>$qsd->antrance_id]) }}" class="btn btn-outline-danger btn-sm">Stop Exam</a> --}}
                                        {{-- <a href="" class="text">Add Question</a> --}}
                                    </td>
                                    <td class="input-group">
                                        <form action="{{ route('teacherExamResponse.index') }}" method="post">
                                            @csrf
                                            <input type="hidden" id="Qid" name="routine_id" value="{{ $qsd->id }}">
                                            <input type="hidden" name="group_id" value="{{ $qsd->g_id }}">
                                            <button type="submit" class="btn btn-outline-success btn-sm">
                                                Details
                                            </button>
                                        </form>
                                        <button data-id="{{ $qsd->id }}" class="btn btn-outline-info btn-sm quickViewResponse" data-bs-toggle="modal" data-bs-target="#quickViewResponse">
                                           <i class="fas fa-eye pr-1"></i> Quick
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('teacherExamShedult.delete', ['id'=>$qsd->id]) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('teacherExam.finished', ['exam'=>$qsd->antrance_id]) }}" class="btn btn-outline-warning btn-sm ">Finish</a>
                                        <button class="btn btn-outline-success btn-sm btn-disabled" >ON LIVE</button>
                                    </td> --}}
                                    
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- response view modal  --}}
<div class="modal fade" id="quickViewResponse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" class="UpdateExamRoutineLabel" id="exampleModalLabel">
            View Exam Response
            <div class="totalView btn btn-info">
    
            </div>
            
        </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('teacherExamShedult.update') }}" method="post" id="upateExamData">
            @csrf
            <input type="hidden" name="id" id="showResponse" value="">
            
            <div class="modal-body showResponseData">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>


@push('script')
<script>
    $('.quickViewResponse').click(function (e) {
        let id = $(this).attr('data-id');

        axios.get("{{ URL::to('/api/teacher/exam/response') }}",
        {
            params:{
                id:id
            }
        })
        .then(function (response) {
            console.log(response.data);
            if (response.data.length == "") {
                $('.totalView').text("No Data Found !");
            }else{
                $('.totalView').text( response.data.length + " Respose");
                let html = '';
                $('.showResponseData').children().remove();
                let index = 1;
                for (let i = 0; i < response.data.length; i++) {
                    html += 
                    `
                    <div class="input-group">
                        <span class="input-group-text"> ${index++} </span>
                        <input type="text" disabled name="" class="form-control" value="`+response.data[i].name+`">
                        <span class="input-group-text bg-info text-light">`+response.data[i].submit_on+`</span>
                    </div>
                        
                    `;

                }
                $('.showResponseData').append(html)
            }
        })
    })
</script>
@endpush
@endsection