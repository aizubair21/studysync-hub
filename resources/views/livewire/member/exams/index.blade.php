<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
  @section('title')
    <h1>Archieve Exams</h1>
  @endsection
  
  @section('page_title')
    <div>
        <a class="text-sm" href="{{route("dashboard")}}">Home</a>
        <br>
        <h1>Archieve Exams</h1>
    </div>
  @endsection


    <div class="p-4">
        {{-- nav  --}}
        <section class="flex items-center justify-center text-sm ">
            <select name="" id="" class="border border-1 shadow rounded border-red-900 px-3 py-1 text-lg">
                <option value="live">Live Now</option>
                <option value="wekly">This Weakl</option>
                <option value="month">This Month</option>
                <option value="schedule">Schedule All</option>
            </select>
        </section>
        {{-- nav  --}}
        
        <div>

            <div class="text-center p-3">
                <div class="text-xl font-bold ">No Data Found !</div>
                <p>There are no live exam held in today or current now.</p>
                <p> You can see 'SCHEDULE EXAM' instead</p>
            </div>

        </div>

        <div style="display:grid; grid-template-columns: repeat(auto-fit, 300px); grid-gap:20px; justify-content:center">

            <div class="m-1 p-2">
                <div class=" shadow-lg rounded-md  overflow-hidden">
                    <div  class="relative shadow-lg" style="z-index: 1">
                        <img style="width: 300px; height:200px; object-fit:cover; object-position:center" src="{{asset('media/studysync-hub.jpg')}}" alt="">
                        <button class="absolute bottom-0 top-0 h-7 px-3 border-s border-green-900 bg-white shadow-lg text-sx" > General </button>
                    </div>

                    <div class="p-2 py-3 mt-5">

                        <h1 class="text-xl">Lorem ipsum dolor sit amet.</h1>
                        <p class="rounded-pill px-2 text-sm bg-green-900 text-white inline-flex">MATH</p>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Question</th>
                                <th class="w-auto border-r ">Time</th>
                                <th class="w-auto  ">Mark</th>
                            </tr>
                            <tr>
                                <td class="border-r">200</td>
                                <td class="border-r">120 Min</td>
                                <td class="">100</td>
                            </tr>
                            </table>

                        </div>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Correct</th>
                                <th class="w-auto border-r ">Wrong</th>
                                <th class="w-auto  ">Skip</th>
                            </tr>
                            <tr>
                                <td class="border-r">
                                    <div class="text-green-900 font-bold px-2 rounded flex items-center justify-center">+1</div>
                                </td>
                                <td class="border-r">
                                    <div class="text-red-900 font-bold px-2 rounded flex items-center justify-center">-1</div>
                                </td>
                                <td class="">
                                    <div class="font-bold px-2 rounded flex items-center justify-center">0</div>
                                </td>
                            </tr>
                            </table>

                        </div>

                        <div class="text-center mt-3 w-full">
                            <a wire:navigate href="" class="w-full px-4 py-2 rounded bg-green-900 hover:bg-green-700 text-white hover:transition-all">Take Exam</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-1 p-2">
                <div class=" shadow-lg rounded-md  overflow-hidden">
                    <div  class="relative shadow-lg" style="z-index: 1">
                        <img style="width: 300px; height:200px; object-fit:cover; object-position:center" src="{{asset('media/studysync-hub.jpg')}}" alt="">
                        <button class="absolute bottom-0 top-0 h-7 px-3 border-s border-green-900 bg-white shadow-lg text-sx" > General </button>
                    </div>

                    <div class="p-2 py-3 mt-5">

                        <h1 class="text-xl">Lorem ipsum dolor sit amet.</h1>
                        <p class="rounded-pill px-2 text-sm bg-green-900 text-white inline-flex">MATH</p>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Question</th>
                                <th class="w-auto border-r ">Time</th>
                                <th class="w-auto  ">Mark</th>
                            </tr>
                            <tr>
                                <td class="border-r">200</td>
                                <td class="border-r">120 Min</td>
                                <td class="">100</td>
                            </tr>
                            </table>

                        </div>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Correct</th>
                                <th class="w-auto border-r ">Wrong</th>
                                <th class="w-auto  ">Skip</th>
                            </tr>
                            <tr>
                                <td class="border-r">
                                    <div class="text-green-900 font-bold px-2 rounded flex items-center justify-center">+1</div>
                                </td>
                                <td class="border-r">
                                    <div class="text-red-900 font-bold px-2 rounded flex items-center justify-center">-1</div>
                                </td>
                                <td class="">
                                    <div class="font-bold px-2 rounded flex items-center justify-center">0</div>
                                </td>
                            </tr>
                            </table>

                        </div>

                        <div class="text-center mt-3 w-full">
                            <a wire:navigate href="" class="w-full px-4 py-2 rounded bg-green-900 hover:bg-green-700 text-white hover:transition-all">Take Exam</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-1 p-2">
                <div class=" shadow-lg rounded-md  overflow-hidden">
                    <div  class="relative shadow-lg" style="z-index: 1">
                        <img style="width: 300px; height:200px; object-fit:cover; object-position:center" src="{{asset('media/studysync-hub.jpg')}}" alt="">
                        <button class="absolute bottom-0 top-0 h-7 px-3 border-s border-green-900 bg-white shadow-lg text-sx" > General </button>
                    </div>

                    <div class="p-2 py-3 mt-5">

                        <h1 class="text-xl">Lorem ipsum dolor sit amet.</h1>
                        <p class="rounded-pill px-2 text-sm bg-green-900 text-white inline-flex">MATH</p>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Question</th>
                                <th class="w-auto border-r ">Time</th>
                                <th class="w-auto  ">Mark</th>
                            </tr>
                            <tr>
                                <td class="border-r">200</td>
                                <td class="border-r">120 Min</td>
                                <td class="">100</td>
                            </tr>
                            </table>

                        </div>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Correct</th>
                                <th class="w-auto border-r ">Wrong</th>
                                <th class="w-auto  ">Skip</th>
                            </tr>
                            <tr>
                                <td class="border-r">
                                    <div class="text-green-900 font-bold px-2 rounded flex items-center justify-center">+1</div>
                                </td>
                                <td class="border-r">
                                    <div class="text-red-900 font-bold px-2 rounded flex items-center justify-center">-1</div>
                                </td>
                                <td class="">
                                    <div class="font-bold px-2 rounded flex items-center justify-center">0</div>
                                </td>
                            </tr>
                            </table>

                        </div>

                        <div class="text-center mt-3 w-full">
                            <a wire:navigate href="" class="w-full px-4 py-2 rounded bg-green-900 hover:bg-green-700 text-white hover:transition-all">Take Exam</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-1 p-2">
                <div class=" shadow-lg rounded-md  overflow-hidden">
                    <div  class="relative shadow-lg" style="z-index: 1">
                        <img style="width: 300px; height:200px; object-fit:cover; object-position:center" src="{{asset('media/studysync-hub.jpg')}}" alt="">
                        <button class="absolute bottom-0 top-0 h-7 px-3 border-s border-green-900 bg-white shadow-lg text-sx" > General </button>
                    </div>

                    <div class="p-2 py-3 mt-5">

                        <h1 class="text-xl">Lorem ipsum dolor sit amet.</h1>
                        <p class="rounded-pill px-2 text-sm bg-green-900 text-white inline-flex">MATH</p>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Question</th>
                                <th class="w-auto border-r ">Time</th>
                                <th class="w-auto  ">Mark</th>
                            </tr>
                            <tr>
                                <td class="border-r">200</td>
                                <td class="border-r">120 Min</td>
                                <td class="">100</td>
                            </tr>
                            </table>

                        </div>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Correct</th>
                                <th class="w-auto border-r ">Wrong</th>
                                <th class="w-auto  ">Skip</th>
                            </tr>
                            <tr>
                                <td class="border-r">
                                    <div class="text-green-900 font-bold px-2 rounded flex items-center justify-center">+1</div>
                                </td>
                                <td class="border-r">
                                    <div class="text-red-900 font-bold px-2 rounded flex items-center justify-center">-1</div>
                                </td>
                                <td class="">
                                    <div class="font-bold px-2 rounded flex items-center justify-center">0</div>
                                </td>
                            </tr>
                            </table>

                        </div>

                        <div class="text-center mt-3 w-full bg-red-500 rounded text-white">
                            You already taken this exam. Wailt untill result is published. 
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-1 p-2">
                <div class=" shadow-lg rounded-md  overflow-hidden">
                    <div  class="relative shadow-lg" style="z-index: 1">
                        <img style="width: 300px; height:200px; object-fit:cover; object-position:center" src="{{asset('media/studysync-hub.jpg')}}" alt="">
                        <button class="absolute bottom-0 top-0 h-7 px-3 border-s border-green-900 bg-white shadow-lg text-sx" > General </button>
                    </div>

                    <div class="p-2 py-3 mt-5">

                        <h1 class="text-xl">Lorem ipsum dolor sit amet.</h1>
                        <p class="rounded-pill px-2 text-sm bg-green-900 text-white inline-flex">MATH</p>

                        <div class="py-1">
                            
                            <table class="text-center w-full text-sm">
                            <tr>
                                <th class="w-auto border-r ">Question</th>
                                <th class="w-auto border-r ">Time</th>
                                <th class="w-auto  ">Mark</th>
                            </tr>
                            <tr>
                                <td class="border-r">200</td>
                                <td class="border-r">120 Min</td>
                                <td class="">100</td>
                            </tr>
                            </table>

                        </div>

                        <div class="text-center mt-3 w-full">
                            <a wire:navigate href="" class="w-full px-4 py-2 rounded border bg-green-200 hover:transition-all">Review Exam</a>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>


</div>
