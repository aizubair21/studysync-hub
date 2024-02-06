
@extends('auth.student.student')
@section('title')
    Exam Board > student section
@endsection
@section('content')


<style>
    .img{
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        height: 100px;
        background: #54BBED;
        color: #ffff;
        font-weight: 900;
        overflow: hidden;
        border-radius: 8px;
    }
    .img img {
        width: 100%;
        height: 100px;
    }
    .group {
        margin-left: 3px;
        font-size: 10px;
        padding: 8px 25px;
        border-radius: 25px;
        border: 1px solid #fff;

    }
    .title {
        text-align: center;
        font-weight: 800;
        font-size: 18px;
    }
    .subject {
        text-align: center;
        font-weight: 700;
        font-size: 18px;
    }
    .pageHeader {
        display: flex;
        justify-content: space-between;
        align-items: center
    }
    .pageHeader button {
        font-weight: 600;
    
    }
    .buttonActive {
        border: 1px solid #2CC26B;
        font-weight: 700 !important;
    }
    .examCard {
        padding: 0px 35px;
    }
    .card {
        border-radius: 8px;
        overflow: hidden;
        height: 390px;
        padding: 10px;
        width: 250px;
    }
    .card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0px;;
    }
    .examType {
        padding: 1px 5px;
        background-color: #54BBED;
        color: #000;
        margin: 0px auto;
        display: block;
        width: 65px;
        border-radius: 25px;
        margin-bottom: 10px;
        font-size: 12px;

    }
    .infoText {
        line-height: 18px;
        font-size: 13px;
        font-weight: 700;
        padding-bottom: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .table thead th {
        border-bottom: 0;
    }
    .examInfo th {
        padding: 5px;
        border: 0;
        font-size: 12px;
        padding: 5px 5px 0px 0px;
    }
    .examInfo td {
        padding: 5px 5px 5px 0px;
        border: 0;
        font-size: 22px;
    }
    .examInfo table td:first-child {
        border-right:2px solid rgba(155, 155, 155, 0.582);
    }
    .examInfo table th:first-child {
        border-right:2px solid rgba(155, 155, 155, 0.582);
    }
    .examInfo td:first-child {
        color: #2CC26B;
        font-weight: 700;
    }
    @media (min-width:570px) and (max-width:992px){
           
    }
    @media (max-width:992px){
        .card {
            width:100%;
        }
        .examCard {
            padding: 0px 5px;;
        }
        .nav_sm{
            display: block;
            /* position: fixed;
            top:0;
            left: 0;
            widows: 100%;
            z-index: 999;; */
        }
        .nav_lg{
            display: none !important;
        }
        .pageHeader {
            display: block;
            
        }
    }
    @media (min-width:992px){
        .nav_sm{
            display: none !important;
        }
        .nav_lg {
            display: block;
        }
    }
</style>

<div class="p-2">

    <div class="row">
        <div class="col-12">
            <div class="pageHeader">
              <h4 class="btn" style="font-size:30px; font-weight: 700">
                Your Exams
              </h4>

              <div class="d-flex examNav nav_lg">
                <button class="btn buttonActive" onclick="filterExamShedule('#liveExam', this)">Live Exams</button>
                <button class="btn "  onclick="filterExamShedule('#sheduledExam', this)">Sheduled Exams</button>
                <button class="btn"  onclick="filterExamShedule('#pastExam', this)">Past Exams</button>
              </div>

                <select name="" id="" class="examNav nav_sm form-control form-select" onchange="filterExamShedule(this.value, this)">
                    <option value="#liveExam">Live Exam</option>
                    <option value="#sheduledExam">Sheduled Exam</option>
                    <option value="#pastExam">Past Exam</option>
                </select>
              
            </div>
        </div>
    </div>

    <hr>
    
    @php 
        $groups = DB::table('groups')->get();
    @endphp
    
    <div id="liveExam" class="examShedult">
       
        <div class="row justify-content-left align-items-center">
            @if($live_exam != "") 
                @foreach ($live_exam as $exam)
                {{-- @php print_r($exam) @endphp --}}
                    <div class="col-lg-3 col-md-6 examCard mb-2">
                        <div class="card">
                            <div class="img">
                                <div style="font-size: 25px" class="d-flex align-items-center w-100">
                                    <img src="{{ asset('storage') }}/image/default.png" alt="">
                                </div>
                                {{-- <div class="group">
                                    {{ $exam->gp_name }}
                                </div> --}}
                            </div>
                            <div class="card-body text-center"> 
                                <div>
                                    <div>
                                        @if ($exam->exam_type == "1")
                                            <span class="examType text-light" >
                                                MCQ
                                            </span>
                                        @else
                                            <span class="examType bg-warning text-light" >
                                                Written
                                            </span>
                                        @endif
    
                                        <div class="subject text-dark">
                                            {{ Str::upper($exam->exam_subject)}}
                                        </div>
                                        <div class="infoText" >
                                            {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci ipsum repellendus, deserunt voluptas distinctio veritatis iusto. --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="examInfo text-center    ">
                                <table class="table">
                                    <thead>
                                        <tr style="font-size:14px;">
                                            <th>Total Questions</th>
                                            <th>Duration (Minutes)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @php 
                                                    $total_question = DB::table('exam_question')->where('exam_id', $exam->id)->count();
                                                @endphp
                                                {{
                                                    $total_question;
                                                }}
                                            </td>
                                            <td>{{ $exam->total_time }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                @php 
                                    $exam_antrance = DB::table('exam_antrance')->where('s_id', Auth::user()->id)->where('exam_id', $exam->examRoutine_id)->get();
                                    $exam_antrance_id = DB::table('exam_antrance')->where('s_id', Auth::user()->id)->where('exam_id', $exam->examRoutine_id)->first();
                                @endphp
                                @if ($exam_antrance->count() > 0)

                                    {{-- <form action="{{ route('studentExamReview.index') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="e" id="" value="{{ $exam->examRoutine_id }}">
                                        <input type="hidden" name="a" id="" value="{{ $exam_antrance_id->id }}">
                                        <input type="hidden" name="u" id="" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-info btn-md px-5 py-1 ">View Result</button>
                                    </form> --}}

                                    <button disabled="disabled" class="btn btn-danger btn-sm rounded rounded-pill btn-sm px-5 py-1">You already take this exam once.</button>
                                @else

                                <a href="{{ route('assignToExam', ['exam'=>$exam->antrance_id]) }}" class="btn btn-success rounded rounded-pill btn-sm px-5 py-1" >Enter</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                
            @else 
                <div class="alert alert-warning">
                    No exam in live.
                </div>
            @endif
    
    
        </div>
    </div>


    <div id="sheduledExam" class="examShedult">
        <div class="row justify-content-left align-items-center">
        
            @if($sheduled_exam != "") 
                @foreach ($sheduled_exam as $exam)
                    <div class="col-lg-3 col-md-6 examCard mb-2">
                        <div class="card">
                            <div class="img">
                                <div style="font-size: 25px" class="d-flex align-items-center w-100">
                                    <img src="{{ asset('storage') }}/image/default.png" alt="">
                                </div>
                                {{-- <div class="group">
                                    {{ $exam->gp_name }}
                                </div> --}}
                            </div>
                            <div class="card-body text-center"> 
                                <div>
                                    <div>
                                        @if ($exam->exam_type == "1")
                                            <span class="examType text-light" >
                                                MCQ
                                            </span>
                                        @else
                                            <span class="examType bg-warning text-light" >
                                                Written
                                            </span>
                                        @endif
    
                                        <div class="subject text-dark">
                                            {{ Str::upper($exam->exam_subject)}}
                                        </div>
                                        <div class="infoText" >
                                            {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci ipsum repellendus, deserunt voluptas distinctio veritatis iusto. --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="examInfo text-center    ">
                                <table class="table">
                                    <thead>
                                        <tr style="font-size:14px;">
                                            <th>Total Questions</th>
                                            <th>Duration (Minutes)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @php 
                                                    $total_question = DB::table('exam_question')->where('exam_id', $exam->id)->count();
                                                @endphp
                                                {{
                                                    $total_question;
                                                }}
                                            </td>
                                            <td>{{ $exam->total_time }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('assignToExam', ['exam'=>$exam->antrance_id]) }}"  class="btn btn-info  btn-sm px-5 py-1 disabled" >
                                    Exam will be held in {{ date( 'd M Y', strtotime($exam->exam_date)) }}
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            @else 
                <div class="alert alert-warning">
                    No exam were in shedule.
                </div>
            @endif
    
    
        </div>
    </div>


    <div id="pastExam" class="examShedult">
        <div class="row justify-content-start align-items-center">
        
            @if($past_exam != "") 
                @foreach ($past_exam as $exam)
                    <div class="col-lg-3 col-md-6 examCard mb-2">
                        <div class="card">
                            <div class="img">
                                <div style="font-size: 25px" class="d-flex align-items-center w-100">
                                    <img src="{{ asset('storage') }}/image/default.png" alt="">
                                </div>
                                {{-- <div class="group">
                                    {{ $exam->gp_name }}
                                </div> --}}
                            </div>
                            <div class="card-body text-center"> 
                                <div>
                                    <div>
                                        @if ($exam->exam_type == "1")
                                            <span class="examType text-light" >
                                                MCQ
                                            </span>
                                        @else
                                            <span class="examType bg-warning text-light" >
                                                Written
                                            </span>
                                        @endif
    
                                        <div class="subject text-dark">
                                            {{ Str::upper($exam->exam_subject)}}
                                        </div>
                                        <div class="infoText" >
                                            {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci ipsum repellendus, deserunt voluptas distinctio veritatis iusto. --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="examInfo text-center    ">
                                <table class="table">
                                    <thead>
                                        <tr style="font-size:14px;">
                                            <th>Total Questions</th>
                                            <th>Duration (Minutes)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @php 
                                                    $total_question = DB::table('exam_question')->where('exam_id', $exam->id)->count();
                                                @endphp
                                                {{
                                                    $total_question;
                                                }}
                                            </td>
                                            <td>{{ $exam->total_time }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                @if($exam->status == 2)
                                    <form action="{{ route('studentExamReview.index') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="e" id="" value="{{ $exam->id }}">
                                        <input type="hidden" name="a" id="" value="{{ $exam->exam_antrance_id }}">
                                        <input type="hidden" name="u" id="" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-info btn-md px-5 py-1 ">View Result</button>
                                    </form>
                                @endif
                                {{-- <a href="{{ route('assignToExam', ['exam'=>$exam->antrance_id]) }}" class="btn btn-warning  btn-sm px-5 py-1 disabled" >
                                    Exam Expired at {{ $exam->exam_date }}
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <pre>
                        @php
                            // print_r($past_exam)
                        @endphp
                    </pre>
                    
                @endforeach
            @else 
                <div class="alert alert-warning">
                    No Past Exam.
                </div>
            @endif
    
    
        </div>

        
    </div>
   
    
</div>

@push('script')
<script>
    $('.examShedult').hide();
    $('#liveExam').show();
    function filterExamShedule(val, e) {
        $('.btn').removeClass('buttonActive')
        $('.examShedult').hide();
        e.classList.add('buttonActive');
        $(val).show();
    }
</script>
@endpush
@endsection