<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @section('page_title')
        <h4>
            Dashboard
        </h4>
    @endsection

    @section('title')
        Student Panel
    @endsection


        
    {{-- main content  --}}
    <div class="flex w-full">
        <div class="w-1/2 p-4">
            <div class="shadow p-3 rounded-md">
                <div class="text-2xl font-bold">
                    Welcome Back !
                </div>
                <div class="font-lg">
                    {{auth()->user()->name}}
                </div>
            </div>


            {{-- overview --}}
            <div class="border-1 py-2 text-center my-1 shadow rounded">
                <h4 class="pb-2 font-bold">Exam Taken</h4>
                <div class="flex items-center justify-center">
                    <div class="py-4 px-5 m-1 border-r border-1">
                        <div class="pb-3 text-md">Live</div>
                        <div>0</div>
                    </div>
                    <div class="py-4 px-5 m-1 border-r border-1">
                        <div class="pb-3 text-md">Finished</div>
                        <div>0</div>
                    </div>
                    <div class="py-4 px-5 m-1 border-r border-1">
                        <div class="pb-3 text-md ">Dropped</div>
                        <div>0</div>
                    </div>
                    <div class="py-4 px-5 m-1">
                        <div class="pb-3 text-md">Taken</div>
                        <div>0</div>
                    </div>
                </div>
            </div>
            {{-- overview --}}
        </div>

        <div class="w-1/2 p-4">
            <div class="rounded shadow p-3">
                <div class="pb-3 font-bold font-md">Recent Activities</div>
                <div class="ms-3">
                    <ul>
                        <li class="flex items-center justify-between">
                            <div>
                                Nov 24, 2024 4:30 PM
                            </div>
                            <div class="flex items-center justify-between">
                                <p>Windows Chrome 131.0.0.0</p>
                                <p class="px-3 bg-green-400 rounded-pill">Sign In</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    {{-- main content  --}}





</div>
