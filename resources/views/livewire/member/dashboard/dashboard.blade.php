<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
@section('title')
    Member panel
@endsection

@section('content')
<style>
   
    .welcome {
        background-color:#54BBED;
        border-radius: 8px;
        margin: 15px 0PX;
        overflow: hidden;
    }
    .welcome .welcome_text {
        width: 80%;
        color: white;
        padding: 15px 25px;
        text-align: left;
    }
    .welcome_text .h4 {
        font-weight: 900 important;
    }


    .welcome_image {
        position: relative;
        display: flex;
        justify-content: flex-end;
    }

    .welcome_image .over_one {
        position: absolute;
        top: 75%;
        right: -150px;
        /* transform: translate(-50%, -50%); */
        padding: 100px;
        background-color: #026a9e;
        z-index: 2;
        border-radius: 50%;
    }
    .welcome_image .over_two {
        position: absolute;
        top: 110%;
        right: -300px;
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

    /*.rightSide {
        padding-left: 15px;
    }





    @media (max-width:992px){
        /* .welcome {
            order: 2;
        } */
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
        

        /* #showExam {
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
        } */

    }
</style>


<div class="md:flex">
    <div class="lg:w-1/3">
        <div class="flex m-0 justify-content-between welcome">
            <div class="welcome_text">
                <div>
                     Welcome back!  
                </div>
                <h4 class="h4 bolder text-xl lg:text-3xl">
                   {{Str::upper(auth()->user()->name)}}
                </h4>
                <p>
                    You currently have 0 live exam. We believe you can perform your best.
                </p>
                <a href="" class="flex mt-4 rounded py-1">Learn More  </a>
            </div>

            <div class="welcome_image">
                <div class="over_one"></div>
                <div class="over_two"></div>
                <div class="image flex">
                    {{-- <img src="{{ asset('media/user-mail.png')}}" width="150" alt=""> --}}
                    {{-- @if (Auth::user()->gender == "male")
                    @endif
                    @if (Auth::user()->gender == "femail")
                        <img src="{{ asset('storage') }}/image/default_girl.png" width="150" alt="">
                    @endif --}}

                </div>
            </div>
            
        </div>
    </div>

    <div class="lg:w-2/3 sm:flex md:block xl:flex justify-between items-start p-2">
       
        <div class="w-full p-2">
            <div class="w-full px-5 py-3 flex justify-center items-center position_box">
                <div class="position text-center px-6 py-2">
                    <h4>Position</h4>
                    <span class="text-xl" style="font-weight: bolder">23</span>
                </div>
                <div class=" h-full w-3">|</div>
                <div class="competitor text-center px-6 py-2">
                    <h4>
                        Competitors
                    </h4>
                    <span class="text-xl" style="font-weight: bolder">1005</span>
                </div>
            </div>
        </div>

        <div class="w-full p-2">

            <div class="" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(105px, 1fr));justify-content:center; grid-gap:10px"> 
                
                <div class="overflow-hidden bg-white shadow-md rounded-lg">
                    <div class=" p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                            </div>
                            <div class="text-right text-2xl bold">
                                10
                            </div>
                        </div>
                    </div>
                    <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                        Live Exam
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-md rounded-lg">
                    <div class=" p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                            </div>
                            <div class="text-right text-2xl bold">
                                10
                            </div>
                        </div>
                    </div>
                    <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                        Live Exam
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-md rounded-lg">
                    <div class=" p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                            </div>
                            <div class="text-right text-2xl bold">
                                10
                            </div>
                        </div>
                    </div>
                    <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                        Live Exam
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-md rounded-lg">
                    <div class=" p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                            </div>
                            <div class="text-right text-2xl bold">
                                10
                            </div>
                        </div>
                    </div>
                    <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                        Live Exam
                    </div>
                </div>
                
            </div>
        
        </div>

    </div>

</div>

<hr>

<div class="lg:flex items-start py-2">
    
    <div class="h-full w-full lg:w-2/3 p-4 bg-white rounded">
        <div class="text-lg mb-3 border-b w-full">
            Recent Activities
        </div>
    
        <div class="overflow-hidden overflow-x-scroll scrolbar-none" style="--webkit-scrollbar:none">
    
            <table class=" w-full ta">
                <thead>
                    <tr>
    
                        <th>#</th>
                        <th>Device</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="py-2">
    
                        <td class="p-2">01</td>
                        <td class="p-2">Chrome, Windows NT</td>
                        <td class="p-2">12:12:25 at 10:47 AM</td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>

    <div class="lg:w-1/3 w-full">
        {{-- <div class="sm:flex">
            <div class="w-1/2 w-full p-2">
                <div class="w-full px-5 py-3 flex justify-center items-center position_box">
                    <div class="position text-center px-6 py-2">
                        <h4>Position</h4>
                        <span class="text-xl" style="font-weight: bolder">23</span>
                    </div>
                    <div class=" h-full w-3">|</div>
                    <div class="competitor text-center px-6 py-2">
                        <h4>
                            Competitors
                        </h4>
                        <span class="text-xl" style="font-weight: bolder">1005</span>
                    </div>
                </div>
            </div>
            <div class="w-2/2 w-full py-3">

                <div class="" style="display:grid; grid-template-columns:repeat(auto-fit, 105px); grid-gap:10px"> 
                    <div class="overflow-hidden bg-white shadow-md rounded-lg">
                        <div class=" p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                                </div>
                                <div class="text-right text-2xl bold">
                                    10
                                </div>
                            </div>
                        </div>
                        <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                            Live Exam
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-md rounded-lg">
                        <div class=" p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                                </div>
                                <div class="text-right text-2xl bold">
                                    10
                                </div>
                            </div>
                        </div>
                        <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                            Live Exam
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-md rounded-lg">
                        <div class=" p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                                </div>
                                <div class="text-right text-2xl bold">
                                    10
                                </div>
                            </div>
                        </div>
                        <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                            Live Exam
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-md rounded-lg">
                        <div class=" p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img src="{{asset('storage')}}/image/wifi_solid.svg" alt="">
                                </div>
                                <div class="text-right text-2xl bold">
                                    10
                                </div>
                            </div>
                        </div>
                        <div class="bottom w-full px-3 py-2 text-right bg-red-600 text-white rounded-b-lg">
                            Live Exam
                        </div>
                    </div>
                    
                   
                </div>
            
            </div>

        </div> --}}
       
    </div>
</div>

<hr>

<div class="flex mb-3">
    

    

    
</div>


@endsection
</div>
