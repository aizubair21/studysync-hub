@extends('auth.teacher.teacher')
@section('title')
    View Exam with question > Teacher Control
@endsection

@section('content')
<div class="content-wrapper">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-bdoy d-flex justify-content-between align-items-center px-3">
                <div class="btn">
                    Details Question
                </div>
                <div class="d-flex">
                    <form action="{{route('teacherQuestion.create')}}" method="get" target="_blank">
                        <input type="hidden" name="routine_id" class="routineId" value="{{ $_GET['routine_id'] }}">
                        <input type="hidden" name="group_id" class="groupId" value="{{ $_GET['group_id'] }}">
                        <button type="submit" class="btn btn-info btn-sm" >
                            <i class="fas fa-plus mr-2"></i> Add Question
                        </button>
                    </form>
                   
                    <a href="{{route('teacherExamShedule.index')}}" class="btn btn-info btn-sm ml-1 ">
                        <i class="fas fa-plus mr-2"></i> Exam Routine
                    </a>
                </div>
            </div>
        
            <div class="card-body">
                @php
                    $i = 1;
                @endphp
                {{-- <div class="row">
                    <div class="col-3 mb-2">
                        <label for="optionTarget" >How do you want to show options ?</label>
                        <select name="optionTarget" id="optionTarget" class="form-control">
                            <option value="">Define</option>
                            <option value="1" selected>Button</option>
                            <option value="2">Option</option>
                        </select>
                    </div>
                </div> --}}
            
                <div class="card">
                    <div class="card-body input-group">
                        @if (count($questions) > 0)
                            
                        @foreach ($questions as $qs)
                        <div class="input-group mb-1">

                                <span class="input-group-text">{{ $i++ }}</span>
                                <input type="text" readonly class="form-control" name="question" value="{{$qs->question}}">
                                <a href="{{ route('teacherQuestion.delete', ['id'=>$qs->id]) }}" id="delete" class="btn bg-danger input-group-text" data-id="{{ $qs->id }}">
                                    <i class="fas fa-minus"></i>
                                </a>
                                <button class="btn bg-info  input-group-text updateQuestion" data-id="{{$qs->id}}" data-bs-toggle="modal" data-bs-target="#updateQuestion">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                            </div>
                        @endforeach
                        @else
                            <div class="alert alert-info">NO Data Found !</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <button data-id="{{$qs->id}}" class="btn btn-info btn-sm viewQuestionOption"  >See Option</button>
<div class=" d-flex justify-content-start align-items-center" >
    @for ($i = 0; $i < count($qs->answers); $i++)
        <input class="@if($qs->answers[$i]->is_correct) is-valid @endif form-control isShowOption mr-3" value="{{ $qs->answers[$i]->option }}">
    @endfor
    {{-- <input type="text" class="form-control is-valid"> --}}
        {{-- <i class="fas fa-minus text text-danger"></i> --}}
{{-- </div> --}}


{{-- update modal  --}}
<div class="modal fade" id="updateQuestion" tabindex="-1" aria-labelledby="updateQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateQuestionModalLabel">Update Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ URL::to('api/teacher/question/update') }}" method="post" id="updateQuestionForm">
            @csrf
            <div class="modal-body ">
                <label for="question">Question :</label>
                <input type="hidden" class="qid" name="q_id" value="">
                <input type="hidden" class="exam_id" name="exam_id" value="">

                <input type="text" name="question" id="question" class="form-control " placeholder="Question" required>
                
                <div class="">
                    <div class="row mt-2 updateQuestionOption">
                    
                    </div>  
                    <div class="w-100 mt-2">
                        <span class="btn btn-info btn-sm float-right plusOption">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update & Save</button>
            </div>
        </form>
      </div>
    </div>
</div>




@push('script')
<script>

$('document').ready(function() {


    // $('.isShowOption').hide();
    // $('.viewQuestionOption').hide();

    // $('#optionTarget').change(function(e){
    //     let target = $(this).val();
    //     if (target == 1) {
    //         $('.viewQuestionOption').show();
    //         $('.isShowOption').hide();
    //     }
    //     if (target == 2) {
            
    //         $('.viewQuestionOption').hide();
    //         $('.isShowOption').show();
    //     }
    // });

    $('.updateQuestion').click(function (e) {
        let id = $(this).attr('data-id');
        // console.log(id);

        axios.get("{{ URL::to('teacher/question/show')}}", 
        {
            params:{
                id:id,
            }
        })
        .then(function(response){
            let html ='';
            $('.updateQuestionOption').children().remove();
            response.data.forEach(element => {
                $('#question').val(element.question);
                $('.qid').val(element.id);
                $('.exam_id').val(element.exam_id);

                for (let q = 0; q < element.answers.length; q++) {

                    let isCor = '';
                    if (element.answers[q].is_correct == 1) {
                        isCor = 'checked';
                    }

                    html += 
                    `
                        <div class="input-group inputOption my-1">
                            <input type="radio" name="is_correct" class="is_correct mr-1" `+isCor+`>
                            <input type="text" name="option[`+ element.answers[q].id +`]" class="form-control" value="${element.answers[q].option}">
                            
                            <span class="input-group-text bg-danger text-light removeOption" onclick="removeOption(this,`+element.answers[q].id+`)" data-id="`+element.answers[q].id+`" >
                                <i class="fas fa-minus"></i>    
                            </span>
                        </div>

                    `;
                    
                }

                $('.updateQuestionOption').append(html);
            });
        })
        .catch(function (error) {
            console.log(error);
        })
    });

    //add option
    let addOp = "";
    $('.plusOption').click(function(e) {
        addOp =
        `
            <div class="newOption input-group inputOption my-1">
                <input type="radio" name="is_correct" class="is_correct mr-1">
                <input type="text" class="form-control" name="newOption[]" >
                
                <span class="input-group-text bg-danger text-light " onclick="this.parentElement.remove()">
                    <i class="fa-solid fa-minus"></i>    
                </span>

            </div>
        `;

        $('.updateQuestionOption').append(addOp);

    });

    //form submit
    $('#updateQuestionForm').submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        
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
                };
                
            };

            if (checkForCorrect) {
                let formData = $(this).serialize();
                $.ajax({
                    url:"{{ URL::to('/api/teacher/question/update') }}",
                    type:'POST',
                    data:formData,
                    success:function(data){
                        console.log(data);
                        if (data.status == 'success') {
                            location.reload();
                        }
                        if (data.status == "error") {
                            console.log(data.data);
                        }
                    }
                });

            }else{
                alert('Please select anyone correct answer.');
            }
        }

    });


//remove option
// $('.removeOption').click(function(e){
//     let id = $(this).attr('data-id');
//     alert(id);
// });

    
})

function removeOption(e, val) {
    console.log(e);
    console.log(val);
    let id = val;
    axios.get("{{ URL::to('api/teacher/question/option/delete') }}", {
        params:{
            id:val,
        }
    })
    .then(function (response) {
        if (response.data.status == 'success') {
            e.parentElement.remove();
        }
    })
    // $.ajax({
    //     url: "{{ URL::to('api/teacher/question/option/delete') }}",
    //     data:val,
    //     type:'GET',
    //     success:function (data) {
    //         console.log(data);
    //     }
    // })

}

//add new question
$('#addQuestion').submit(function (e) {
    e.preventDefault()
    let fmData = $(this).serialize();
    let ri = $('.routineId').val();
    let gi = $('.groupId').val();
    let url = 'create?routine_id='+ri+'&group_id='+gi;
    // window.open("create?routine_id="+ri+"&group_id="+gi,fmData, "_parent", "width=100px, height=100px");
    window.open(url, "_blank", 'width=1000px,height=1000px,left=100px, top=100px')
    // console.log(fmData);
})
</script>
@endpush
@endsection