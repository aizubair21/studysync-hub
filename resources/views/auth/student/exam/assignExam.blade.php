@extends('auth.student.student')
@section('title')
    Assing to exam > student panel
@endsection

@section('content')
@push('style')
    
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
<style>
    * {
        font-family: "Nunito", sans-serif;
    }
    .img{
        position: relative;;
        background-color: #5c0303;
        color: #fff;
        
    }
    .live {
        text-align: center;
        font-weight: 900;
        font-size: 35px;
    }
    .title {
        text-align: center;
        font-size: 25px;
        text-transform: uppercase;
    }
    .subject {
        padding:3px;
        font-size: 20px;
    }
    li {
        list-style-type: square;
    }
    .takeExamBtn {
        font-weight: 800;
    }
    .row {
        max-width: 1900px;

    }
    .left, .right {
        padding: 0px 25px;
    }
    .left .image {
        width: 100%;
        /* max-width: 1400px; */
        max-height: 200px;
        border-radius: 8px;
        overflow: hidden;
        background-color: #54BBEDff;
    }
    .left .image img {
        width: 100%;
        height: 200px;
    }
    .right .card {
        overflow: hidden;
    }
    .subject {
        font-size: 20px;
        font-weight: 700;
        padding: 12px 0px;
        /* box-shadow: 0px 0px 10px 3px gray; */
    }
    .infoText {
        font-size: 15px;
        font-weight: 500;
        line-height: 20px;
    }
    .examInfo {
        font-size: 15px;
        font-weight: 700;
        line-height: 20px;
        padding-bottom:20px;;
    }
    .examInfo tr td:first-child {
        text-align: right
    }
    .examInfo tr td:last-child {
        text-align-last: left;
    }
    .form-check-label {
        text-align: left;
        font-size: 15px;
        font-weight: 500;
        line-height: 18px;
        padding-left: 5px;
    }
    .desc {
        padding: 25px 0px;
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        color: #000;
        text-align: justify
    }
    
</style>

@endpush
<div class="p-1 mt-3" style="overflow-x: hidden">
    <div class="row">
        
        <div class="left col-lg-8">
            <div class="image">
                <img src="{{ asset('storage/image') }}/default.png" alt="">
            </div>
            <div class="desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur dolor voluptatem repellat quisquam nesciunt maiores nobis dicta, magnam sed earum similique voluptatum quod, veniam corrupti quis perspiciatis ad in accusantium. In earum odit soluta quasi qui exercitationem ipsum nemo, ducimus aperiam cum placeat, dolore minima excepturi esse. Voluptatum laborum quo quos nostrum nisi itaque odio ullam, voluptate maxime eligendi natus quis doloremque quisquam, sint incidunt totam, repellendus accusantium ea alias dolor perferendis debitis delectus cupiditate. Eum cum soluta nesciunt consectetur consequuntur illum, praesentium assumenda? A excepturi ab voluptas perspiciatis et sunt quo quos aspernatur sequi. Non deleniti laboriosam explicabo rerum natus aliquam, saepe nulla assumenda eveniet error? Consequatur nihil fugit quisquam illum ad. Asperiores ullam itaque, iure perferendis odit rem eius beatae est quam sit fuga iste alias nam commodi blanditiis minima adipisci ab nostrum, id quis suscipit quasi modi laboriosam consectetur! Illo debitis cum ex! Hic placeat similique quasi repellendus architecto quibusdam facere minima repudiandae. Tempore totam incidunt doloremque magni nam commodi quisquam, recusandae quod possimus et! Velit amet minima et enim mollitia fugiat explicabo illum! Earum ut fuga fugit aspernatur impedit sapiente, debitis harum omnis nam labore cumque temporibus vel inventore iure illo et culpa exercitationem est id unde ullam quod blanditiis ratione! Quidem inventore consequatur, repellendus quibusdam tempore perspiciatis expedita voluptas cupiditate id dolorum. Eaque, molestias vitae. Itaque voluptatibus quibusdam architecto dolores tenetur aliquam impedit nobis pariatur iste perferendis, vel obcaecati expedita labore alias error explicabo doloremque nihil, non adipisci dolor veniam! Cupiditate saepe nostrum illum odio.
            </div>
        </div>

        <div class="right col-lg-4">
            <div class="card">
                <div class="card-body text-center"> 
                    <table class="table">
                        <tr>
                            <td>
                                {{Str::ucfirst($live_exam->exam_subject)}}
                            </td>
                        </tr>
                    </table>
                    {{-- <div class=" subject">
                        
                    </div> --}}
                    
                    <table class="table">
                        <tr>
                            <td>
                                <div class="infoText py-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident eius consectetur ab suscipit, aspernatur vero.
                                </div>
                               
                            </td>
                        </tr>
                    </table>
                    {{-- <hr>
                    <strong class="mb-5">Total Questions: </strong> --}}
                    <div class="examInfo">
                        
                        <table class="table ">
                            <tr>
                                <td colspan="2"> Total Question : 
                                    
                                <span class="text-inof">
                                    {{ 

                                            DB::table('exam_question')->where('exam_id', $live_exam->id)->count();
                                        
                                    }}    
                                </span> </td>

                            </tr>
                            <tr>
                                <td>Exam Duration <i class="fas fa-clock text-info"></i> </i></td>
                                <td class="text-info"> {{ $live_exam->total_time }} Minutes</td>
                            </tr>
                            <tr>
                                <td>For Every Correct <i class="fas fa-check-circle text-success" ></td>
                                <td class="text-success"> {{$live_exam->for_correct}}</td>
                            </tr>
                            <tr>
                                <td>For Every Inorrect <i class="fas fa-circle-xmark text-danger"></i> </td>
                                <td class="text-danger"> - {{$live_exam->for_incorrect}}</td>
                            </tr>
                            <tr>
                                <td>For skipping <i class="fas fa-circle-xmark text-danger"></i> </td>
                                <td class="text-danger"> - {{$live_exam->for_skiped}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            I Gruanted, Everything are ok and ready to exam.
                        </label>
                    </div>
                    <div class="takeExam text-center" >
                        @if ($exam_antrance > 0)
                        <button class="btn btn-success px-5 rounded rounded-pill btn-sm" disabled  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >You Have take this exam once.</button>
                        @else
                        <button class="btn btn-success px-5 rounded rounded-pill btn-sm takeExamBtn" disabled  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Take Exam</button>
                        @endif

                    </div>
                </div>
            </div>
            @php 
                // print_r($live_exam)

            @endphp
        </div>
        {{-- <div class="col-lg-6">
            <div class="card">

                <div class="img">
                    <div class="live">
                        LIVE EXAM
                    </div>
                    <h2 class="title">
                        {{ $live_exam->exam_name }}
                    </h2>
                    <div style="text-align:center;margin-bottom:5px">
                        Group : {{ $live_exam->gp_name }}
                    </div>
                    <hr style="background-color: #fff; height:2px">
                    <div class="subject d-flex justify-content-between px-3" >
                        <div>
                            Subject : {{ $live_exam->exam_subject  }}
                        </div>
                        <div>
                            Total Question : 
                        </div>
                        <div>
                            Total Time : {{$live_exam->total_time}} Minute
                        </div>
                    </div>
                </div>

                <div class="card-body">
                 
                    <div class="alert alert-info mt-2">
                        <div class="bn">
                            Exam Rules
                        </div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="duration text-center" >
                        Total Marks : 
                    </div>
                    <div>
                        Marks Distribution :
                    </div>
                    <div class=" d-flex">
                        <span class="alert alert-info" > For Correct :  {{ $live_exam->for_correct }} </span> 
                        <span class="alert alert-info mx-2"> For Incorrect : {{ $live_exam->for_incorrect}} </span>
                        <span class="alert alert-info"> For Skip : {{ $live_exam->for_skiped}} </span>
                    </div>
                    <hr>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            I Gruanted, Everything are ok and ready to exam.
                        </label>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="takeExam text-center" >
            <button class="btn btn-info btn-lg takeExamBtn"   style="font-size: 20px; important" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Take Exam</button>
        </div> --}}
    </div>
</div>

{{-- <button type="button" class="btn btn-outline-success btn-lg rounded rounded-pill" data-id="" class="btn btn-primary" >Assign To Exam </button> --}}

{{-- exam confirm popup --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Attention</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <ul>
                <li>
                    If you go anyway from your exam entire window. and stary more than 5 secound. your exam will be finished.
                </li>
                <li>
                    If time over. Your exam will be finished automaticly. it's close your window.
                </li>
                
            </ul>
          <strong>Again ! </strong> <br>
          I Gruanted, that everything are ok and ready to tak exam .
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary startExam">Understood</button>
        </div>
      </div>
    </div>
</div>


{{-- <script src="{{asset('public/back-end')}}/plugins/jquery/jquery.min.js"></script> --}}

@endsection
@push('script')    
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}

<script>
    $('#defaultCheck1').click(function checkTrigger(){
        let isChecked = $('#defaultCheck1').prop('checked');
        if (isChecked) {
            $('.takeExamBtn').prop('disabled', false)
        }else{
            
            $('.takeExamBtn').prop('disabled', true)
        }

        
        setInterval(() => {
            $('#defaultCheck1').prop('checked', false);
            checkTrigger();
        }, 3000);
    });

    //start exam 
    let features = ['menubar=no, location=no,resizable=no,scrillbar=no,stutus=no'];

    $('.startExam').click(function (e) {
        window.close();
        let href = "{{ URL::to('start-exam', ['exam'=>$live_exam->antrance_id]) }}";
        
        let hg = window.innerHeight;
        let wd = window.innerWidth;

        let targetScreen = "width="+wd+"px, height="+hg+"px";

        window.open(href, '_blank', targetScreen);

    })

    // close popup
    $('.takeExamBtn').click(function closeExamInfoPopup() {
        setInterval(() => {
            $('#staticBackdrop').hide();
        }, 15000);
    })
</script>
@endpush  