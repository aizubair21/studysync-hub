@extends('auth.teacher.teacher')
@section('title')
    All Pending Exam > teacher control
@endsection

@section('content')
<div class="content-wrapper p-2">
    <div class="card">
        <div class="w-100 d-flex justify-content-between align-items-center p-2" style="border-bottom:1px solid rgb(231, 231, 231)">
            <div>
               <i class="fas fa-chart"></i> View Drafted Exam Routine
            </div>
            <div>
                <a href="{{route('teacherExamShedule.create')}}" class="btn btn-primary btn-md ">
                    <i class="fas fa-plus mr-2"></i> Add Routine
                </a>
            </div>
        </div>
        <div class="card-body">

            <table class=" " id="dataTables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Exam Name </th>
                        <th>Subject</th>
                        <th>Group</th>
                        <th>Date </th>
                        <th>Start</th>
                        <th>Duration</th>
                        <th title="how many number add for single correct answer.">R</th>
                        <th title="how many number cut for single wrong answer.">W</th>
                        <th title="how many number cut for skipped a question.">S</th>
                        <th>Question</th>
                        {{-- <th>Questions</th> --}}
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @if (count($pending_exam) < 1)
                        <tr>
                            <td colspan="14"> No Data Found ! </td>
                        </tr>
                    @else
                        @foreach ($pending_exam as $qsd)
                            @php 
                                $group = DB::table('groups')->where('gp_modaretor', Auth::id())->where('id', $pending_exam[0]->g_id)->first();
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
                                <td>{{ date('Y F d', strtotime($qsd->exam_date)) }}</td>
                                <td>{{ $qsd->exam_time }}</td>
                                <td>{{ $qsd->total_time }} Minute</td>
                                <td>{{ $qsd->for_correct }}</td>
                                <td>{{ $qsd->for_incorrect }}</td>
                                <td>{{ $qsd->for_skiped }}</td>
                                <td>
                                    <form action="{{ route('teacherQuestion.index') }}" method="get">
                                        @method('get')
                                        <input type="hidden" id="Qid" name="routine_id" value="{{ $qsd->id }}">
                                        <input type="hidden" name="group_id" value="{{ $qsd->g_id }}">
                                        <button type="submit" class="btn btn-success">
                                            Details
                                        </button>
                                    </form>

                                    <button data-id="{{  $qsd->id  }}"  class="btn text text-success showQuestions" data-bs-toggle="modal" data-bs-target="#viewQuestion">
                                        Quick View 
                                    </button>
                                    {{-- <a href="" class="text">Add Question</a> --}}
                                </td>
                                {{-- <td class="f-flex">
                                    <form action="{{ route('teacherQuestion.create') }}" method="get">
                                        @method('get')
                                        <input type="hidden" id="Qid" name="routine_id" value="{{ $qsd->id }}">
                                        <input type="hidden" name="group_id" value="{{ $qsd->g_id }}">
                                        <button type="submit" class="btn btn-info btn-sm">
                                            Add
                                        </button>
                                    </form>
                                    <button class="btn text text-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal" >
                                        <i class="fa-solid fa-plus mr-1"></i>Quick Add
                                    </button>
                                    
                                </td> --}}
                                {{-- <td>
                                    @if ($qsd->status == 0)
                                    <div class="btn-group btn-group-toggle" >
                                        <label class="btn bg-success active">
                                        {{-- <input type="radio" name="options" id="option_b1" autocomplete="off" checked> Active
                                            <a href="{{route('teacherExam.publish', ['exam'=>$qsd->antrance_id])}}" class="text" id="option_b1">Publish</a>
                                        </label>
                                    
                                    </div>
                                    @endif
                                </td> --}}
                                <td class="">
                                    <div class="btn-group btn-group-toggle" >
                                        <label class="btn bg-info ">
                                            <form action="{{ route('teacherExam.unpublish') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="exam" value="{{ $qsd->antrance_id }}">
                                                <input type="submit" value="Unpublis">
                                            </form>
                                        </label>
                                        <label class="btn bg-danger text-light">
                                        {{-- <input type="radio" name="options" id="option_b1" autocomplete="off" checked> Active --}}
                                            <a href="{{ route('teacherExamShedult.delete', ['id'=>$qsd->id]) }}" class="text" id="delete">Delete</a>
                                        </label>
                                        {{-- <label class="btn bg-olive">
                                            <a href="#"  data-id="{{  $qsd->id  }}" class="text updateExamRoutine" data-bs-toggle="modal" data-bs-target="#UpdateExamRoutine" id="option_b2">Edit</a>
                                        </label> --}}
                                    
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>




{{-- update exam routine modal  --}}
<div class="modal fade" id="UpdateExamRoutine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" class="UpdateExamRoutineLabel" id="exampleModalLabel">Exam Routine Update</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('teacherExamShedult.update') }}" method="post" id="upateExamData">
            @csrf
            <input type="hidden" name="id" id="updateExamId" value="">
            <div class="modal-body showExamEditData">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>


{{-- add question modal  --}}
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addQuestionModalLabel">Add Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="AddQuestion">
            @csrf
            <div class="modal-body ">
                <label for="question">Question :</label>
                <input type="hidden" id="Qid" name="routine_id" value="{{ $qsd->id ?? "" }}">
                <input type="hidden" name="group_id" value="{{ $qsd->g_id ?? "" }}">

                <input type="text" name="question" id="question" class="form-control " placeholder="Question" required>
                
                <div class="">
                    <div class="row mt-2 addQuestionOption">
                        <div class="co-12">
                            <div class="input-group inputOption">
                                <input type="radio" name="is_correct" value="" class="is_correct">
                                <input type="text" name="option[]" placeholder="Option" class="form-control" value="" required>
                                
                                <span onclick="this.parentElement.remove()" class="input-group-text">
                                    <i class="fa-solid fa-minus text text-danger" ></i>
                                </span>

                            </div>
                        </div>
                        <div class="co-12 mt-1">
                            <div class="input-group inputOption">
                                <input type="radio" name="is_correct" value="" class="is_correct">
                                <input type="text" name="option[]" placeholder="Option" class="form-control" value="" required>
                                
                                <span onclick="this.parentElement.remove()" class="input-group-text">
                                    <i class="fa-solid fa-minus text text-danger" ></i>
                                </span>

                            </div>
                        </div>

                    </div>
                    <div class="col-12 mt-2">

                        <button type="button" class="btn btn-info btn-sm float-right" id="addOption">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- view question modal  --}}
<div class="modal fade" id="viewQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">View Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
            @csrf
            <div class="modal-body showQuestionModal">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
            </div>
        </form>
      </div>
    </div>
</div>



{{-- @push('script'); --}}
@push('script')
    
<script>
jQuery(document).ready(function(){
    

    // show info for update
    $(".updateExamRoutine").click(function (e) {
        let id = $(this).attr('data-id');
        $('#updateExamId').val(id);
        $('.showExamEditData').children().remove();
        axios.get("{{ URL::to('teacher/exam/shedule/edit') }}", {
                params: {
                id: id,
                }
            })
            .then(function (response) {
                // handle success
                console.log(response.data);
                $('.UpdateExamRoutineLabel').html(response.data.exam_name +' exam - '+ response.data.exam_subject + "  (Update Info)");

                let html = 
                `
                    <div class="row d-flex">
                        <div class="col-6">
                            <label for="exam_date" class="form-label">Exam Date :</label>
                            <input type="date" id="exam_date" name="examdate" value="${response.data.exam_date}" class="form-control">
                        </div>
                        <div class="col-6 my-2">
                            <label for="exam_time" class="form-label">Exam Time :</label>
                            <input type="time" id="exam_time" name="startime" value="${response.data.exam_time}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="duration" class="form-label">Exam Duration (minutes):</label>
                            <input type="number" id="duration" name="duration" value="${response.data.total_time}" class="form-control">
                        </div> 
                        <div class="col-6 my-2">
                            <label for="for_correct" class="form-label">For Correct (Number):</label>
                            <input type="number" id="for_correct" name="for_correct" value="${response.data.for_correct}" class="form-control">
                            <span class="form-text text text-info"> Number must be positive. </span>
                        </div>
                        <div class="col-6">
                            <label for="for_incorrect" class="form-label">For Inorrect (Number):</label>
                            <input type="number" id="for_incorrect" name="for_incorrect" value="${response.data.for_incorrect}" class="form-control">
                            <span class="form-text text text-info"> Number must be positive. </span>
                        </div>
                        <div class="col-6">
                            <label for="for_skiped" class="form-label">For Skipped (Number):</label>
                            <input type="number" id="for_skiped" name="for_skiped" value="${response.data.for_skiped}" class="form-control">
                            <span class="form-text text text-info"> Number must be positive. </span>
                        </div>
                    </div>
                `;

                $('.showExamEditData').append(html);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    });

    //show all question
    $('.showQuestions').click(function (e) {
        let id =  $(this).attr('data-id');
        
        //ajaz call 
        $('.ansData').children().remove();             
        $('.showQuestionModal').children().remove();
        axios.get("{{ URL::to('teacher/question/edit') }}", {
            params: {
                id: id,
            }
        })
            .then(function (response) {
                let i = 1;
                let answerData = '';
                questionData = response.data;

                response.data.forEach(loData);
                function loData(question, index) {
                    // console.log(question.answers);
                        let html = document.createElement('div');
                        html.innerHTML= 
                         `
                            <div class="row mb-2"> 
                                <div class="col-12 mb-2">
                                    <div class="input-group">
                                        <label class="form-label input-group-text h5"> Q${i++}: </label>
                                        <input type="text" readonly class="form-control" value="${question.question}">
                                        <span  data-id="${question.id}" class='input-group-text bg-danger text-light modalQuestionDelete'>
                                        <i class="fa-solid fa-minus "></i>
                                        </span>
                                        <i data-id="${question.id}" class="fa-solid fa-edit text text-info input-group-text modalQuestionUpdate"></i>
                                    </div>
                                   
                                    <input type="hidden" name="q_id" id="q_id" value="${question.id}">
                                </div>
                            </div>
                                
                        `;
                                
                                
                        // console.log(question.answers.option);
                        
                        $('.showQuestionModal').append(html);
                    };
                    
                    // $('.ansData').append(answerData);             
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });


    });

    //add option
    $('#addOption').click(function (e) {
        
        let html = 
        `
            <div class="input-group mt-1 inputOption">
                <input type="radio" name="is_correct" class="is_correct">
                <input type="text" name="option[]" placeholder="Option" class="form-control" required value="">
                
                <span onclick="this.parentElement.remove()" class="input-group-text">
                    <i class="fa-solid fa-minus text text-danger" ></i>
                </span>

            </div>
        `;
        if ($('.inputOption').length < 6) {
            $('.addQuestionOption').append(html);
        }else{
            alert("Maximum six option.");
        }
        
    });

    //question submit
    $('#AddQuestion').submit(function (e) {
        e.preventDefault();

        if ($('.inputOption').length < 2) {
            alert("please add minimum two option");
        }else{
            let checkForCorrect = false;

            for (let i = 0; i < $('.is_correct').length; i++) {
                
                if($('.is_correct:eq('+i+')').prop('checked') == true){
                    checkForCorrect = true;
                    // $('.is_correct:eq('+i+')').val( $('.is_correct:eq('+i+')').next().find('input').val() );
                    $('.is_correct:eq('+i+')').val( $('.is_correct:eq('+i+')').siblings().val() )
                    // $('.is_correct:eq('+i+')').val(i);
                }
                
            }

            if (checkForCorrect) {
                let formData = $(this).serialize();
                $.ajax({
                    url:"{{ URL::to('/ajax/teacher/question/store') }}",
                    type:'POST',
                    data:formData,
                    success:function(data){
                        console.log(data);
                        if (data.status == 'success') {
                            location.reload();
                        }
                        if (data.status == error) {
                            console.log(data.data);
                        }
                    }
                });

            }else{
                alert('Please select anyone correct answer.');
            }
        }
    });


    $('.modalQuestionDelete').click(function(e) {
        let id = $(this).attr(data-id);
        console.log(id);
        alert(id);
    });


    //exam routine delete


});
</script>
@endpush
@endsection