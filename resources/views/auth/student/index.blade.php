@extends('auth.student.student')
@section('title')
student panel
@endsection
@push('style')
<style>
    body {
        font-family: "Nunito", sans-serif;
    }
    .welcome {
        background-color:#54BBED;
        border-radius: 8px;
        margin-bottom: 5px;
    }
    .welcome .welcome_text {
        widows: 100%;
        color: white;
        padding: 15px 25px;
        text-align: left;
        z-index: 1;
    }
    .h4 {
        font-weight: 500 important;
    }


    .welcome_image {
        position: relative;
        overflow: hidden;
        width: 50%;
        display: flex;
        justify-content: flex-end;
    }

    .welcome_image .over_one {
        position: absolute;
        top: 80%;
        right: -40%;
        transform: translate(-50%, -50%);
        padding: 100px;
        background-color: #1a92ce;
        z-index: 2;
        border-radius: 50%;
    }
    .welcome_image .over_two {
        position: absolute;
        top: 80%;
        right: -60%;
        transform: translate(-50%, -50%);
        padding: 140px;
        background-color: #154e6a1a;
        z-index: 1;
        border-radius: 50%;
    }
    .welcome .welcome_image .image {
        z-index: 5
    }

    .position_box {
        background-color: #fff;
        font-size: 20px;
        font-weight: 600;
        border-radius: 8px;
        box-shadow: 0px 0px 1px gray;
        margin-bottom: 15px;;
    }
    .position_box .position{

    }
    .position_box  h4{
        
        font-size: 18px;
        font-weight: 600;
        margin: 0px;
    }
    .position_box span{
        font-size: 25px;
        font-weight: 700;
        color: #0D6934;
        opacity: .7;
    }
    .position_box .position span:first-child(){
    }
    .position_box .middle {
        width: 2px;
        height: 70px;
        background-color: rgb(221 214 214);
    }

    .message .messages:not(:last-child){
        border-bottom: 2px solid rgb(235 230 230);
    }
    .message .messages {
        padding:3px 0px;
    }
    .message .messages .image {
        min-width: 50px;
        min-height: 50px;
        max-width: 50px;
        max-height: 50px;
        border-radius: 50%;
        margin-right: 3px;
        overflow: hidden;
    }
    .message .messages img {
        border-radius: 50%;
    }
    .message .messages h6 {
        font-size: 16px;
        color: #0D6934;
        margin-bottom: 1px;
        font-weight:900;
    }
    .message .messages p {
        font-size: 14px;
        color: #0D6934
    }

    .rightSide {
        padding-left: 15px;
    }


    #showExam {
        margin: 10px 0px;
    }
    #showExam .liveExam {
        background-color: #FA6D6D;
        color:white;
        border-radius:8px;
    }
    #showExam .sheduledExam {
        background-color: #EBB25C;
        color:white;
        border-radius:8px;
    }
    #showExam .card .top{
        font-size: 35px;
    }
    #showExam .card .top div:first-child{
        margin-bottom: -45px;
    }
    #showExam .card .top img {
        width: 50px;
        color:white;
        opacity: .4;
    }
    #showExam .card .bottom{
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px
    }



    @media (max-width:992px){
        .welcome {
            order: 2;
        }
        .welcome_image {
            display:none;
        }
        .welcome_text .h4 {
            font-size: 15px;
        }
        .welcome_text p {
            font-size: 12px;
        }
        .welcome_text a {
            font-size: 12px;
        }
        

        #showExam {
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
        }
        #showExam .liveExam {
            width:45%;
        }
        #showExam .sheduledExam {
            width: 45%;
        }
        #showExam .card .top {
            font-size: 35px;
        }
        #showExam .card .top img {
            width:55px;
            opacity: .4;
            margin-bottom: -15px;
        }
        #showExam .card .bottom {
            font-size: 12px
        }
        #showExam .card .card-body{
            padding: 5px 15px !important;
        }


        .rightSide {
            padding: 0px;
            margin: 0px;

        }
        #cart {
            display: none;
        }

    }
</style>
@endpush
@section('content')
<div >

    {{-- top bar --}}
        <div class="row ">
            <div class="col-12 d-flex justify-content-between ailgn-items-center">
                <h2 style="font-weight: 600">
                    Dashboard
                </h2>
                <div>
                    <a href="" class="btn btn-outline-success btn-sm rounded rounded-pill px-3">Helpline</a>
                </div>
            </div>
        </div>


        
        
    @if($group != "")
        
        {{-- main part --}}
        <div class="row mt-2">

            {{-- left side --}}
            <div class="col-lg-9 leftSide">

                {{-- welcome text  --}}
                <div class=" welcome">
                    <div class="d-flex justify-content-between">
                        <div class="welcome_text">
                            <h4 class="h4">
                                Welcome back! {{ Auth::user()->name }}
                            </h4>
                            <p>
                                You currently have {{ $live_count }} live exam. We believe you can perform your best.
                            </p>
                            <a href="" class="btn px-3 fs-4 btn-sm rounded rounded-pill bg-light text-dark">Learn More</a>
                        </div>
    
                        <div class="welcome_image">
                            <div class="over_one"></div>
                            <div class="over_two"></div>
                            <div class="image d-flex">
                                @if (Auth::user()->gender == "male")
                                    <img src="{{ asset('storage') }}/image/default_boy.png" width="150" alt="">
                                @endif
                                @if (Auth::user()->gender == "femail")
                                    <img src="{{ asset('storage') }}/image/default_girl.png" width="150" alt="">
                                @endif

                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row" >
                    {{-- left column, show exam sheduled --}}
                    <div class="col-lg-4" id="showExam">
                        <div class="card liveExam">
                            <div class="card-body">
                                <div class="top">
                                    <div>
                                        <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                                    </div>
                                    <div class="text-right">
                                       {{$live_count}}
                                    </div>
                                </div>
                            </div>
                            <div class="bottom w-100 p-2 text-right" style="background-color: #DB4444; color:white">
                                Live Exam
                            </div>
                        </div>
                        
                        <div class="card sheduledExam">
                            <div class="card-body">
                                <div class="top">
                                    <div>
                                        <img src="{{asset('storage')}}/image/calendar_alt_solid.svg" alt="">
                                    </div>
                                    <div class="text-right">
                                        1
                                    </div>
                                </div>
                            </div>
                            <div class="bottom w-100 p-2 text-right" style="background-color: #B6863F; color:white">
                                Sheduled Exam
                            </div>
                        </div>
                        
                    </div>


                    {{-- right column --}}
                    <div class="col-lg-8">
                        <div class="card card-danger mt-2" id="cart">
                            <div class="card-header">
                              <h3 class="card-title">Pie Chart</h3>
              
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                              <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>
                
    
    
            </div>
    

            {{-- right side --}}
            <div class="col-lg-3 rightSide" >

                {{-- positon and compititors --}}
               <div class="w-100 px-5 py-3 d-flex justify-content-between align-items-center position_box">
                    <div class="position text-center">
                        <h4>Position</h4>
                        <span>23</span>
                    </div>
                    <div class="middle"></div>
                    <div class="compititor text-center">
                        <h4>
                            Compititors
                        </h4>
                        <span>1005</span>
                    </div>
                </div>

                {{-- message to tutor --}}
                <div class="card">
                    <div class="card-body">
                        <div class="message-header d-flex justify-content-between align-items-center mb-3">
                            <div style="color:#0D6934; font-weight:700">
                                Message to tutors
                            </div>
                            <div>
                                <i class="fas fa-message"></i>
                            </div>
                        </div>

                        <div class="message">
                            <div class="messages d-flex justify-content-start align-items-center">
                                <div class="image">
                                    <img src="{{ asset('storage') }}/image/default_boy.png" width="40" height="40" alt="">
                                </div>

                                <div class="pl-1 pt-3 text-left">
                                    <h6 >Amimul Ihsan <span></span></h6>
                                    <p style="line-height: 18px">Lorem ipsum dolor sit amet sit amet sit amet sit amet sit amet sit amet </p>
                                </div>
                            </div>
                            <div class="messages d-flex justify-content-start align-items-center">
                                <div class="image">
                                    <img src="{{ asset('storage') }}/image/default_boy.png" width="40" height="40" alt="">
                                </div>

                                <div class="pl-1 pt-3 text-left">
                                    <h6 >Amimul Ihsan <span></span></h6>
                                    <p style="line-height: 18px">Lorem ipsum dolor sit amet </p>
                                </div>
                            </div>
                            <div class="messages d-flex justify-content-start align-items-center">
                                <div class="image">
                                    <img src="{{ asset('storage') }}/image/default_boy.png" width="40" height="40" alt="">
                                </div>

                                <div class="pl-1 pt-3 text-left">
                                    <h6 >Amimul Ihsan <span></span></h6>
                                    <p style="line-height: 18px">Lorem ipsum dolor sit amet </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 text-center py-2" >
                        <a style="color:#0D6934" href="">View All</a>
                    </div>
                </div>
            </div>


        </div>

    @else 

        {{-- student's group is empty --}}
        <div class="col-12 alert alert-warning">Your are not add to any student gorup. please contact with your teacher.</div>
    @endisset


</div>


@push('script')
<script>
    let features = ['menubar=no, location=no,resizable=no,scrillbar=no,stutus=no'];
    $('.liveExam').click(function (e) {
        window.open("{{ route('showLiveExam') }}");
    });
</script>
@endpush
@endsection