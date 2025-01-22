<div id="exam_cart">

    <style>
        #exam_cart .img{
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
        #exam_cart .img .overlay 
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            height: 60px;
            color: #ffffff52;
            font-size: 35px;
            text-align: center;
            vertical-align: middle;

        }
        #exam_cart .img img {
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
        #exam_cart .card {
            border-radius: 8px;
            overflow: hidden;
            /* height: 380px; */
            padding: 10px;
            /* width: 250px; */
        }
        #exam_cart .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
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

    @props(['item', ])

    <div {{$attributes->merge(['rounded'])}}>
        
        <div class="card bg-white">
            <div class="img">
                <div style="font-size: 25px" class="d-flex align-items-center w-100">
                    <img src="{{ asset('media/app.png') }}" alt="">
                </div>
                <div class="overlay">
                    MATH
                </div>
            </div>

            <div class="flex-column h-full flex-1 justify-between items-center">

                <div class="card-body"> 
                    <div class="flex justify-start items-center text-sm">
                        {{-- @if ($exam->exam_type == "1")
                            <span class="examType text-light" >
                                MCQ
                            </span>
                        @else
                            <span class="examType bg-warning text-light" >
                                Written
                            </span>
                        @endif --}}
    
                        <span class="py-1" >
                            mcq
                        </span>
    
                        <div class="px-3">
                            -
                        </div>
                            exam name goes here
                        <div class="">
                            
                        </div>
                    </div>
                    <h1 class="text-lg font-bold text-center" style="font-size: 25px">
                        {{ Str::upper("math")}}
                    </h1>
                    <h3 class="w-fullt text-green-900 font-bold py-2 text-center my-1">

                        exam time goes here
                    </h3>
                    
                </div>
                <hr>
                <div class="examInfo text-center w-full">
                    <table class="table w-full">
                        <thead>
                            <tr style="font-size:15px;">
                                <th>Total Questions</th>
                                <th>Duration (Minutes)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{-- @php 
                                        $total_question = DB::table('exam_question')->where('exam_id', $exam->id)->count();
                                    @endphp --}}
                                    100
                                </td>
                                <td>90</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>                
                    <div class="my-2">

                        <div class="flex items-center justify-between px-4 my-1 border-b">
                            <div class="flex items-center justify-start">
                                <div class="w-2 h-2 bg-green-900 me-3"></div>
                                <div class="text-sm">
                                    Negative Mark
                                </div>
                            </div>
                            <div>
                                -0.10
                            </div>
    
                        </div>

                        <div class="flex items-center justify-between px-4 my-1 border-b">
                            <div class="flex items-center justify-start">
                                <div class="w-2 h-2 bg-green-900 me-3"></div>
                                <div class="text-sm">
                                    Plus Mark
                                </div>
                            </div>
                            <div>
                                -0.10
                            </div>
    
                        </div>
                       
                    </div>


                </div>
                <div class="text-center flex-column flex-1">
                    {{-- @php 
                        $exam_antrance = DB::table('exam_antrance')->where('s_id', Auth::user()->id)->where('exam_id', $exam->examRoutine_id)->get();
                        $exam_antrance_id = DB::table('exam_antrance')->where('s_id', Auth::user()->id)->where('exam_id', $exam->examRoutine_id)->first();
                    @endphp --}}
                    
                    {{-- <form action="{{ route('studentExamReview.index') }}" method="post">
                            @csrf
                            <input type="hidden" name="e" id="" value="{{ $exam->examRoutine_id }}">
                            <input type="hidden" name="a" id="" value="{{ $exam_antrance_id->id }}">
                            <input type="hidden" name="u" id="" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-info btn-md px-5 py-1 ">View Result</button>
                        </form> --}}
                        
                    {{-- @if ($exam_antrance->count() > 0)
                        <button disabled="disabled" class="btn btn-danger btn-sm rounded rounded-pill btn-sm px-5 py-1">You already take this exam once.</button>
                    @else --}}
                    {{-- @endif --}}

                    <a href="" class="mt-2 mx-auto w-2/4 text-md block rounded-xl bg-green-900 text-white px-3 py-1" >Enter</a>
                </div>

            </div>
        </div>

    </div>
</div>