@extends('auth.teacher.teacher')
@section('title')
Add Question > Teacher Control
@endsection


@section('content')
<div class="content-wrapper">

{{-- 
    <pre>
        {{
            print_r($groups)
        }}
    </pre> --}}



    {{-- select exam to make question --}}
    {{-- <div class="row">
        <div class="col-md-12 p-2">
            <label for="select-exam">Select exam routine to make question :</label>
        </div>
    </div> --}}

    {{-- exam info  --}}
        @foreach ($errors->all() as $error)
            <div class="text text-dagner">{{ $error }}</div>
        @endforeach
    @isset($exam_info)
        <div class="row">
            <div class="col-12 p-3">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        See exam info
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body bg-info text-light d-flex align-items-center px-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name" class="form-label">Exam Name :</label>
                                            <input type="text" class="form-control" disabled value="{{ $exam_info->exam_name }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="subject" class="form-label">Exam Group :</label>
                                            <input type="text" disabled class="form-control" value="{{ $groups->gp_name }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="subject" class="form-label">Exam Subject :</label>
                                            <input type="text" disabled class="form-control" value="{{ $exam_info->exam_subject }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="date">Exam Date :</label>
                                            <input type="text" disabled class="form-control" value="{{$exam_info->exam_date }}">
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="row">
            <div class="col-md-7 pr-3">
                <div class="card">
                    <div class="w-100 p-2 bg-info text-light d-flex justify-content-between">
                        <div>
                            Add Question
                        </div>
                        <div>
                            <a href="" class="btn btn-primary btn-sm ">All </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacherQuestion.store') }}"  method="post" enctype="multipart/form-data" onsubmit=" return formCheck() ">
                            @method('post')
                            @csrf 
                            <input type="hidden" name="examId" value="{{ $exam_info->id }}">
                            
                            
                            <div class="question-title">
                                <label class="form-label">Question Title : </label>
                                <div class="input-group mb-2">
                                    <label for="qType" class="input-group-text">Question Type :</label>
                                    <select id="qType" name="qType" class="form-control form-select">
                                        <option value="">Select your question type </option>
                                        <option value="1" selected class="form-option">Text Only</option>
                                        <option value="2">Image + Text</option>
                                        {{-- <option value="3">Audio</option> --}}
                                        {{-- <option value="4">Video</option> --}}
                                    </select>
                                </div>

                                {{-- question type content  --}}

                                <div class="">
                                    <input type="text" placeholder="Question" name="question" class="form-control" required>
                                </div>
                                
                                <div class="qTypeCont qtTwo">

                                    
                                    {{-- <input type="text" placeholder="Question" name="question" class="form-control" > --}}
                                    
                                    {{-- <div class="input-group mt-1">

                                        <input type="file" class="form-control form-file" name="image"  aria-describedby="basic-addon" >
                                        <label for="image" class="input-group-text" id="basic-addon">
                                            <i class="far fa-image"></i>
                                        </label>
                                        
                                    </div>
                                    <div class="form-text text-info">Your uploaded image size not more then 5 MB.</div> --}}
                                    
                                </div>
                                <div class="qTypeCont qtThree">

                                    
                                    {{-- <input type="text" placeholder="Question" name="question" class="form-control" > --}}
                                    {{-- <div class="input-group mt-1">
                                        <label for="audio" class="form-control">Audio File :</label>
                                        <input type="file" class="form-control form-file" name="audio"  aria-describedby="basic-addon1" >
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa-solid fa-microphone"></i>
                                        </span>
                                    </div>
                                    <div class="form-text text-info">Your uploaded audio file size not more then 5 MB.</div> --}}
                                </div>
                                <div class="qTypeCont qtFour">
                                    
                                    
                                    {{-- <input type="text" placeholder="Question" name="question" class="form-control" > --}}
                                    {{-- <div class="input-group mt-1">

                                        <input type="file" class="form-control form-file" name="video"  aria-describedby="basic-addon" >
                                        <span class="input-group-text" id="basic-addon">
                                            <i class="fa-solid fa-play"></i>
                                        </span>
                                    </div>
                                    <div class="form-text text-info">Your uploaded video file size not more then 20 MB.</div> --}}
                                </div>




                            </div>
                            <hr style="background-color: rgb(196, 191, 191)">
                            


                            <div class="question-option mt-5">

                                <label class="form-label">Question Option : </label>

                                <div class="input-group mb-1">
                                    <label for="opType" class="input-group-text">Answer Type :</label>
                                    <select id="opType" name="ansType" class="from-control form-select">
                                        <option value="">Define option type</option>
                                        <option value="1" selected>Text</option>
                                        {{-- <option value="2">Audio</option> --}}
                                        {{-- <option value="3">Text</option> --}}
                                        <option value="4">Image</option>
                                        {{-- <option value="5">File</option> --}}
                                    </select>
                                </div>

                                <div id="qtOption" class="mt-2">
                                    
                                </div>
                                <hr>
                        
                                <div class="w-100 mt-3">
                                    <button type="submit" class="btn btn-info btn-lg float-right">
                                        <i class="fas fa-save mr-2"></i>    Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    
            <div class="col-md-5" style="overflow-y: scroll">
                <div class="card">
                    <div class="w-100 p-2 bg-info text-light ">
                        All Question
                    </div>
                    <div class="card-body">
                        @php $i = 1;  @endphp
                        @foreach ($questions as $q)
                            <div class="input-group mb-1">
                                <span class="input-group-text" id="">Q {{ $i++ }} .</span>
                                <input type="text" class="form-control bg-light" disabled name="d" placeholder="Questions" value="{{ $q->question ?? "" }}" aria-label="Option D" aria-describedby="basic-addon1">
                                {{-- <span class="input-group-text bg-danger ml-1 btn-sm" id="">X</span> --}}
                                {{-- <button data-id="{{ $q->id }}" class="input-group-text bg-default">
                                    <i class="fas fa-eye"></i>
                                </button> --}}
                                <a href="{{ route('teacherQuestion.delete', ['id'=>$q->id]) }}" id="delete" class="input-group-text bg-danger">
                                    <i class="fas fa-trash"> </i>
                                </a>
                                <button data-id="{{ $q->id }}" class="input-group-text bg-info questionUpdate" data-bs-toggle="modal" data-bs-target="#updateQuestion">
                                    <i class="fas fa-sync"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endisset

    

</div>

{{-- delte modal    --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure want to delete this question ?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Delete</button>
        </div>
      </div>
    </div>
</div>


{{-- update modal  --}}
<div class="modal fade" id="updateQuestion" tabindex="-1" aria-labelledby="updateQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateQuestionModalLabel">Update Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="updateQuestionForm">
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



{{-- view modal  --}}

@push('script')
    
<script>
//open delete modal, and get data from server
$('.questionUpdate').click(function (e) {
    let id = $(this).attr('data-id');
    
    axios.get("{{ URL::to('/api/teacher/question/show') }}",
    {
        params:{
            id:id
        }
    })
        .then(function (response) {
            let questionOption = '';
            response.data.forEach(element => {
                $('.updateQuestionOption').children().remove();;
                $('#question').val(element.question)
                $('.qid').val(element.id);
                $('.exam_id').val(element.exam_id);

                let Is_cor = '';
                for (let q = 0; q < element.answers.length; q++) {
                    
                    if (element.answers[q].is_correct == 1) {
                        Is_cor = "checked";
                    }else{
                        Is_cor = "";
                    }
                    questionOption += 
                    `
                    <div class="co-12 mt-1">
                        <div class="input-group inputOption">
                            <input type="radio" name="is_correct" class="is_correct mr-1" `+Is_cor+`>
                            <input type="text" name="option[`+element.answers[q].id+`]" placeholder="Option" class="form-control" value="${element.answers[q].option}" required>
                            
                            <span  onclick="removeOption(this,`+element.answers[q].id+`)"class="input-group-text">
                                <i class="fa-solid fa-minus text text-danger" ></i>
                            </span>

                        </div>
                    </div>
                    `;
                    
                }
                $('.updateQuestionOption').append(questionOption);
            });
        })
        .catch(function (error) {
            console.log(error);
        })
});
  
$('#qType').change((e) => {

    let targetVal = e.target.value;
    console.log(targetVal);

    $('.qTypeCont').hide();
    switch (targetVal) {
        case "1":
            $('.qtOne').show();
            Toast.fire({
                icon: 'info',
                title: "Only text question.",
            })
            break;

        case "2":
            $('.qtTwo').show();
            Toast.fire({
                icon: 'info',
                title: "You can add an image with your text question.",
            });
            break;

        case "3":
            $('.qtThree').show();
            Toast.fire({
                icon: 'info',
                title: "You can add a audio file with your text question.",
            });
            break;

        case "4":
            $('.qtFour').show();
            Toast.fire({
                icon: 'info',
                title: "You can add a video source file with your text question.",
            })
            break;
    }
});

let optMQ =
    `<div class="qtOption qtOptionMcq mt-2">
        <div class="row" id="basicMcqOption">
            <div class="text text-info ">
                Tick the check mark beside on correct answer.
            </div>
            <div class="col-sm-6 ">
                <div class="input-group mb-3">
                    <input class="input-group-text mr-1 is_correct" type="radio" name="is_correct"">
                    <input type="text" name="option[]" class="form-control" placeholder="option">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input class="input-group-text mr-1 is_correct" type="radio" name="is_correct"">
                    <input type="text" name="option[]" class="form-control" placeholder="option">
                </div>
            </div>

        </div>
        <div class="error"></div>       
        <div class="w-100">
            <button type="button" class="border border-0 float-right bg-success text-light  rounded-pill" id="addMoreOpt" > <i class="fa-solid fa-plus"></i> </button>
        </div>
       
    </div>`;

//default option MCQ
$('#qtOption').append(optMQ);


//answer type
$('#opType').change((e) => {
    let targetVal = e.target.value;
    switch (targetVal) {
        case "1":

            $('#qtOption').children().remove();
            $('#qtOption').innerHTML = '';
            break;

        case '2':
            $('#qtOption').children().remove();

            Toast.fire({
                icon: 'info',
                title: "Student have to select an option from multiple choice",
            })
            $('#qtOption').append(optMQ);
            break;
        case "3":

            $('#qtOption').children().remove();
            let opAudio =
                `
                <div class="input-group mt-2">
                    <span class="alert alert-info w-100 text-center">Sudent Must Have To Upload An Audio File. Against This Question.</soan>
                </div>
                `;

            $('#qtOption').append(opAudio);
            Toast.fire({
                icon: 'info',
                title: "Student have to upload an audio file",
            })
            break;

        case "4":
            $('#qtOption').children().remove();
            let opText =
                `
                    <div class="input-group mt-1">
                        <span class="alert alert-info w-100 text-center">Student have to write something against this question.</span>
                    </div>
                `;

            $('#qtOption').append(opText);
            Toast.fire({
                icon: 'info',
                title: "Student have to write something against question.",
            })
            break;

        case "5":
            $('#qtOption').children().remove();

            let opImage =
                `<div class="qtOption qtOptionMcq mt-2">
                    <div class="row" id="basicMcqOption">
                        <div class="text text-info ">
                            Tick the check mark beside on correct answer.
                        </div>
                        <div class="col-sm-6 ">
                            <div class="input-group mb-3">
                                <input class=" mt-0" type="radio"  name="is_correct">
                                <input type="file" name="option[]" class="form-control" placeholder="option" required >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                
                                <input class=" mt-0" type="radio"  name="is_correct">
                                <input type="file" name="option[]" class="form-control" placeholder="option" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                
                                <input class=" mt-0" type="radio"  name="is_correct">
                                <input type="file" name="option[]" class="form-control" placeholder="option" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input class=" mt-0" type="radio"  name="is_correct">
                                <input type="file" name="option[]" class="form-control" placeholder="option" required>
                            </div>
                        </div>
            
                    </div>
                    <div class="w-100">
                        <button type="button" class="border border-0 float-right bg-success text-light  rounded-pill" id="addMoreOpt" > <i class="fa-solid fa-plus"></i> </button>
                    </div>
                
                </div>`;

            $('#qtOption').append(opImage);
            Toast.fire({
                icon: 'info',
                title: "choose four imgae. Image formate must be jpg, or png.",
            })
            break;

        case "6":
            $('#qtOption').children().remove();

            let opZip =
                `
                    <div class="input-group mt-1">
                        <span class="alert alert-info w-100 text-center">Sudent have to upload a compresed zip file against this question. </span>
                    </div>
                `;

            $('#qtOption').append(opZip)

            Toast.fire({
                icon: 'info',
                title: "Student have to upload a zip file.",
            })
            break;
    }
});

//add more opiton into question option
$('#addMoreOpt').click((e) => {
    let numWithInt = ['a', 'b', 'c', 'd', 'e', 'f'];
    let optInc = $('#basicMcqOption .col-sm-6').length;
    let optIncCount = ++optInc;

    //only 6 option
    let option =
        `
    <div class="col-sm-6">
        <div class="input-group mb-3">
            <input class="input-group-text mr-1 is_correct" name="is_correct" type="radio">
            <input type="text" name="option[]" placeholder="option" class="form-control" required>

            <span onclick="closeAddedOption(this)" class="btn btn-danger btn-sm"> 
                <i class="fa-solid fa-minus"></i>
            </span>
        </div>            
    </div>
    `;
    if (optInc <= 6) {
        $('#basicMcqOption').append(option);
    } else {
        $('.error').children().remove();
        let alert = `<strong class="text text-warning"> Maximum option field are created. </strong>`;
        $('.error').append(alert);
    }

});

//
function closeAddedOption(e) {
    e.parentElement.remove();
}

//check is any correct is define or not 
function formCheck() {

    if ($('.question').val() == "") {
        alert('Question title is required !');
        return false;

    }else{
        let checkForCorrect = false;
        let isCorrect = '';
        for (let i = 0; i < $('.is_correct').length; i++) {
            
            if($('.is_correct:eq('+i+')').prop('checked') == true){
                checkForCorrect = true;
                // $('.is_correct:eq('+i+')').val( $('.is_correct:eq('+i+')').next().find('input').val() );
                $('.is_correct:eq('+i+')').val( $('.is_correct:eq('+i+')').siblings().val() )
                //$('.is_correct:eq('+i+')').val();
            }
            
        }
 
        if (checkForCorrect) {
            // let formData = $(this).serialize();
            // $.ajax({
            //     url:"{{ URL::to('/ajax/teacher/question/store') }}",
            //     type:'POST',
            //     data:formData,
            //     success:function(data){
            //         console.log(data);
            //         if (data.status == 'success') {
            //             location.reload();
            //         }
            //         if (data.status == error) {
            //             console.log(data.data);
            //         }
            //     }
            // });
            return true;
    
        }else{
            alert('Please select anyone correct answer.');
            return false;
        }
            
 

    }

        
}


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
            <input type="text" class="form-control" name="newOption[]" required>
            
            <span class="input-group-text bg-danger text-light " onclick="this.parentElement.remove()">
                <i class="fa-solid fa-minus"></i>    
            </span>

        </div>
    `;

    if ($('.updateQuestionOption').children().length >= 6) {
        alert('Maximum six option');
    }else{
        $('.updateQuestionOption').append(addOp);
    }


});

//update form submit
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


function removeOption(e, val) {
    // console.log(e);
    // console.log(val);
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
</script>
@endpush
@endsection