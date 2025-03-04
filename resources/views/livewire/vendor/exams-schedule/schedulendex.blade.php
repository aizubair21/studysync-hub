<di>

    {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                    role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav> --}}

    {{-- page header  --}}
    <div class="bg-white mb-4">

        <div class="p-4">

            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl font-bold ">My Schedule</div>
                    <div class="text-sm"> {{ count($exams) ?? '0' }} items</div>

                </div>

                <div class="flex items-center">
                
                    <a wire:navigate href="{{route("vendorExamSchedule.create")}}"
                    class="hover:bg-green-800 hover:text-slate-50 rounded bg-green-900 text-slate-50 px-3 py-2 ">
                    Create</a>
                </div>
            </div>
        </div>

        {{-- table data filter nav --}}
        <div class="flex justify-center items-center">

            
           
            <select name="" id="by_subject" class="p-2 mx-1 bg-white" wire:model.live="filters_by_group">
                <option selected value="*">All Group</option>
                @foreach ($groups as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                @endforeach
            </select>

            {{-- <?php
                $today = now()->format('Y-m-d'); // Format the date as 'YYYY-MM-DD'
                $tomorrow = now()->addDay()->format('Y-m-d');
                $thisWeekStart = now()->startOfWeek()->format('Y-m-d');
                $thisWeekEnd = now()->endOfWeek()->format('Y-m-d');
                $nextWeekStart = now()->addWeek()->startOfWeek()->format('Y-m-d');
                $nextWeekEnd = now()->addWeek()->endOfWeek()->format('Y-m-d');
                $thisMonthStart = now()->startOfMonth()->format('Y-m-d');
                $thisMonthEnd = now()->endOfMonth()->format('Y-m-d');
            ?> --}}
             <div>
                <button wire:click="$toggle('isShowFilterModal')" @class(['p-2 text-green-900 border-l bolder', 'bg-green-900 text-white' => $exam_date != "*" || $result_date != "*"])>Filter</button>
            </div>
          

        </div>
        {{-- table data filter nav end --}}

    </div>
    {{-- page header  --}}

    <div style="margin: 0 auto; max-width:768px; width:100%" x-data="{
        activeNav: 'All',
        activeContent: 'all',
        isFilter: false,
        selectedId: [],
        filter_by_date: null,
        filter_by_group: null,
        filter_by_status: 'all',
    }" >


        {{-- <div class="border-y flex justify-between items-center">

            <button class=" text-nowrap btn d-block border-bottom m-2 btn-success"
                @click="$wire.addQuestionModal(selectedId)">
                <i class="fas fa-pen me-2"></i>
                Make Question
            </button>
            <div>
                <input type="search" class="w-full border rounded px-3 py-2" placeholder="Search by name">
            </div>


            <x-dropdown width="48" maxWidth="sm">
                <x-slot name="trigger">
                    <button class="px-3 py-2 border rounded">More <i class="fas fa-caret-down ms-2"></i></button>
                </x-slot>

                <x-slot name="content">
                    <button class="text-nowrap text-left w-full px-3 py-2 border-b"> <i
                            class="fas fa-arrow-down me-2"></i> Draft
                    </button>
                    <button class="text-nowrap text-left w-full px-3 py-2 border-b"> <i class="fas fa-sync me-2"></i>
                        Published
                    </button>
                    <button class="text-nowrap text-left w-full px-3 py-2 border-b"> <i class="fas fa-play me-2"></i>
                        Live </button>
                    <button class="text-nowrap text-left w-full px-3 py-2 border-b"> <i class="fas fa-trash me-2"></i>
                        Delete
                    </button>
                    <button class="text-nowrap text-left w-full px-3 py-2 border-b"> <i class="fas fa-pen me-2"></i>
                        Edit </button>

                </x-slot>
            </x-dropdown>

        </div> --}}

        {{-- hidden action center  --}}
        <div class=" d-inline-flex scrolbar-none p-0 m-0 hidden" style="width:100%; ;" x-data={}>
            {{-- <div class=" btn btn-lg m-2 mx-3 border-primary p-3" wire:click="$refresh"> <i class="fas fa-carret-down"></i> Draft --}}

            {{-- trash  --}}
            <button x-show="selectedId.length > 0" x-transition type="button" class="text-nowrap px-2 py-1 bg-red mx-1"
                @click="$wire.distroy(selectedId)">Trash
            </button>

            {{-- draft --}}
            <button x-show="selectedId.length > 0" x-transition type="button"
                class="text-nowrap px-2 py-1 border bg-light  mx-1" @click="$wire.draft(selectedId)"></i> Draft</button>

            {{-- published exam --}}
            <button x-show="selectedId.length > 0" x-transition type="button" href=""
                class=" text-nowrap px-2 py-1  bg-green  mx-1" @click="$wire.doPublishedExam(selectedId)">
                Publish
            </button>

            {{-- live exam  --}}
            <button x-show="selectedId.length > 0" x-transition type="button" href=""
                class="text-nowrap px-2 py-1 border  mx-1" @click="$wire.doLiveExam(selectedId)">
                Live
            </button>


        </div>
        {{-- hidden action center --}}



        {{-- table --}}
        <div class="w-full rounded text-md">
            
            <div class="p-1 m-2 bg-white rounded flex items-center justify-between">

                <select wire:model.live="filter_by_status" id="" class="p-2 border border-gray-900 rounded" wire:model="filter_by_status">
                    <option value="*">Uncondition</option>
                    <option value="5">Active</option>
                    <option value="9">Live</option>
                    <option value="0">Draft</option>
                    <option value="1">Archive</option>
                </select>


               

                <select wire:model.live="created" id="group_by" class="p-2 rounded bg-white border">
                    <option value="*">All Time</option>
                    <option selected value="Today">Today</option>
                    <option value="Yestarday">Yestarday</option>
                    <option value="Week">This Week</option>
                    <option value="Month">This Month</option>
                    <option value="Custom">Custom</option>
                </select>
            </div>

            <div class="p-2">
        
                @foreach ($exams as $exm)
                    <div class="my-1 w-full bg-white rounded">
                        {{-- <div class="xl:px-3 xl:py-4 rounded flex items-center w-full bg-white">

                        </div> --}}
                        <div class="p-4 flex items-start w-full ">
                            <div class="h-full px-2 font-bold block  border-r text-lg">
                                {{ $loop->iteration }}
                            </div>

                            <div class="px-3 w-full">

                                <div class="flex items-center justify-between w-full ">
                                    <div class="block items-center justify-between">

                                        <a title="{{$exm->exm_name}}" wire:navigate href="{{route('vendorExamSchedule.view', ['pid' => $exm->id])}}" class="block text-start font-bold text-lg ">
                                            <!-- exam name  -->
                                            {{ Str::substr($exm->exm_name, 0, 20)  }}
                                        </a>

                                        <div class="md:flex justify-between items-start md:items-center text-sm my-2">
                                            {{-- <img class="me-2" width="18" height="18" src="https://img.icons8.com/plumpy/24/people-skin-type-7.png" alt="people-skin-type-7"/> --}}
                                            {{-- <div>{{ \Carbon\Carbon::parse($exm->created_at)->diffForHumans() }}</div> --}}
                                            <div class="hidden md:block flex items-center"> {{ DB::table("groups")->where('id',$exm->group)->get("name")->value("name")}} </div>
                                            <div class="mx-2 md:my-1 hidden md:block">|</div>
                                            <div class="flex item-center"> <img class="me-2" width="18" height="18" src="https://img.icons8.com/material-outlined/24/books--v1.png" alt="books--v1"/> {{$exm->exm_subject}}</div>
                                            <div class="mx-2 md:my-1 hidden md:block">|</div>

                                            <!-- <div class="rounded-full px-2 border  mx-2 bg-green-900 text-white "> Draft
                                            </div> -->

                                            <div class="flex items-center">
                                                <img class="me-2" width="18" height="18" src="https://img.icons8.com/ios/18/calendar--v1.png" alt="calendar--v1"/>
                                                <div class=""> {{\Carbon\Carbon::parse($exm->exm_date)->toFormattedDateString()}} - {{ \Carbon\Carbon::parse($exm->exm_date)->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="" style="align-self: flex-start">

                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="px-2 py-1 rounded border">
                                                    <img width="18" src="{{asset("media/ellipsis-h.png")}}" alt="">
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Select</a>
                                                </div>
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 flex items-center py-2 block rounded w-full text-md ">
                                                        <img class="me-2 hidden md:block" width="18" height="18" src="https://img.icons8.com/?size=100&id=yzgnvoGvB5Tt&format=png&color=000000" alt="time--v1"/> 
                                                        Bann
                                                    </a>
                                                </div>
                                                <hr class="my-1">
                                                <div class="px-1 w-full text-md">
                                                    <a href="" wire:navigate class="px-3 flex py-2 block rounded w-full text-md "> 
                                                        <img class="me-2 hidden md:block" width="18" height="18" src="https://img.icons8.com/?size=100&id=8GIRvZKh33Aj&format=png&color=000000" alt="time--v1"/> 
                                                        Edit 
                                                    </a>
                                                </div>
                                                <div class="px-1 w-full text-md">
                                                    <button class="px-3 py-2 flex rounded w-full text-md text-start" wire:click="destroySingle({{$exm->id}})">
                                                        
                                                        <img class="me-2 hidden md:block" width="18" height="18" src="https://img.icons8.com/?size=100&id=yzgnvoGvB5Tt&format=png&color=000000" alt="time--v1"/> 
                                                        Delete 
                                                    </button>
                                                </div>
                                                <hr class="my-1">
                                                <div class="px-1 w-full text-md">
                                                    <button class="px-3 py-2 flex block rounded w-full text-md "> 
                                                        <img class="me-2 hidden md:block" width="18" height="18" src="https://img.icons8.com/ios-glyphs/18/task--v1.png" alt="time--v1"/>
                                                        Schedule
                                                     </button>
                                                </div>
                                            </x-slot>
                                        </x-dropdown>

                                    </div>
                                </div>

                                <hr class="my-1">

                                <div class="flex justify-between items-center text-center">
                                    
                                    <div class="flex items-center">
                                        <img class="me-2 hidden md:block" width="18" height="18" src="https://img.icons8.com/ios-glyphs/18/time--v1.png" alt="time--v1"/>
                                        {{$exm->link_open_at ?? "Not Defined!"}}
                                        <div class="mx-1">|</div>
                                        {{$exm->exm_duration ?? "Not Defined!"}} Minute 
                                    </div>
                                    
                                    <div class="mx-1 border rounded-full p-1 inline-flex cursor-pointer" wire:click="$toggle('isShowQuestionViewModal')">
                                        <div class="px-2 flex items-center"> {{count($exm->questions ?? [])}} Questions </div>
                                    </div>
                                
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                <div @class(['p-2 text-center', 'block' => count($exams)])>
                    No More Schedule Found !
                </div>
            
            </div>
        </div>
    </div>


    {{-- filter modal  --}}
    <x-modal wire:model="isShowFilterModal" maxWidth="lg">

        <div class="flex justify-between items-center  p-3">
            <h5 class="m-0 text-lg">
                Filter Your Own
            </h5>

            <button class="rounded p-2 text-sm text-gray-700" wire:click="$toggle('isShowFilterModal')">Close</button>
        </div>
        <hr class="my-1">

        <div class="px-3 py-2">
            <h3>Exam Date</h3>
            
            <div class="px-3 py-2">
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="*" id="exam_none">
                    <label for="exam_none" class="ml-2">None -  </label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="Today" id="filter_advanced_exm_date">
                    <label for="filter_advanced_exm_date" class="ml-2">Today - {{now()->toFormattedDateString()}} </label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="Tomorrow" id="filter_advanced_exm_date_2">
                    <label for="filter_advanced_exm_date_2" class="ml-2">Tomorrow</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="Weak" id="filter_advanced_exm_date_3">
                    <label for="filter_advanced_exm_date_3" class="ml-2">Weak</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="Month" id="filter_advanced_exm_date_4">
                    <label for="filter_advanced_exm_date_4" class="ml-2">This Monty  </label>
                </div>

                <div class="my-3 flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="exam_date" value="Between" id="filter_advanced_exm_date_5">
                    <label for="filter_advanced_exm_date_5" class="ml-2">Date Between</label>
                </div>
                <div class="flex justify-between items-center">
                    <div class="">
                        
                        <input type="date" wire:model.live="exam_date_start" class="w-full p- 2 rounded border border-gray-300">    
                        <div >
                            {{Carbon\Carbon::parse($exam_date_start)->toFormattedDateString()}}
                        </div>
                    </div>
                    <div class="">
                        
                        <input type="date" wire:model.live="exam_date_end" class="w-full p- 2 rounded border border-gray-300">    
                        <div >
                            {{Carbon\Carbon::parse($exam_date_end)->toFormattedDateString()}}
                        </div>
                    </div>


                    {{-- <input type="date" wire:model="exam_date_end" class="w-full p- 2 rounded border border-gray-300"> --}}
                </div>
    
            </div>
        </div>
        
        
        <hr class="my-1">
        <div class="px-3 py-2">
            <h3>Result</h3>
            
            
            <div class="px-3 py-2">
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="*" id="result_none">
                    <label for="result_none" class="ml-2">None</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="Today" id="result">
                    <label for="result" class="ml-2">Today - {{now()->toFormattedDateString()}}</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="Tomorrow" id="result_2">
                    <label for="result_2" class="ml-2">Tomorrow</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="Weak" id="result_3">
                    <label for="result_3" class="ml-2">Weak</label>
                </div>
                <div class="flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="Month" id="result_4">
                    <label for="result_4" class="ml-2">This Monty</label>
                </div>

                <div class="my-3 flex items-center justify-start">
                    <input type="radio" style="width: 20px; height: 20px" wire:model.live="result_date" value="Between" id="result_5">
                    <label for="result_5" class="ml-2">Date Between</label>
                </div>
                <div class="flex justify-between items-center">
                        <div>
                            <input type="date" wire:model.live='result_date_start' class="w-full p- 2 rounded border border-gray-300">    
                            <div >
                                {{Carbon\Carbon::parse($result_date_start)->toFormattedDateString()}}
                            </div>
                        </div>
                        <div>
                            
                            <input type="date" wire:model.live="result_date_end" class="w-full p- 2 rounded border border-gray-300">
                            <div >
                                {{Carbon\Carbon::parse($result_date_end)->toFormattedDateString()}}
                            </div>
                        </div>
                </div>
    
            </div>
        </div>

        <hr class="my-1">
        <div class="px-3 py-2">

            {{-- <button class="py-2 px-4 bg-green-900 text-white rounded" wire:click="$toggle('isShowFilterModal')">Filter</button> --}}
        </div>
    </x-modal>
    

    {{-- filter modal  --}}


    {{-- quick add question modals --}}
    <x-dialog-modal wire:model.live="confirmQuickAddQuestion" x-data="{
        options0: '',
        options1: '',
        options2: '',
        options3: '',
    }" x-init="$wire.set('options', { options0, options1, options2, options3 })">
        {{-- <x-slot name="title">
            {{ __('Make quick question to exam') }}
        </x-slot> --}}
        <x-slot name="title" class="bg-light">
            Make Question for exam :
            {{ $this->exams->where('id', $this->selectedExamToAddQuestion)->first()->exm_name ?? '' }}
        </x-slot>
        <hr>
        <x-slot name="content">
            {{-- show error message  here --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit="addQuestion" id="addNewMemberForm">
                <div class="mb-4">
                    <div class="d-flex">

                        <div>

                            <label for="question_type" class="form-label">Select Question Type </label>
                            <select id="question_type"
                                class = "form-control form-select
                                @error('q_type') is-invalid @enderror"
                                wire:model.live="q_type" name="question_type" required autofocus>
                                <option value=""> -- Make Choose --</option>
                                <option selected value="textOnly">Text Only</option>
                                <option value="imageOney">Image Only</option>
                                <option value="testWithImage">Text With Image</option>
                                <option value="videoOney">Video Only</option>
                                <option value="testWithVideo">Text With Video</option>
                                <option value="written">Written </option>
                                <option value="voice">Voice </option>
                                <option value="attached">Attached </option>
                            </select>

                        </div>

                        <div class="mx-3">

                            <label for="answer_type" class="form-label">How Examinee do this answer </label>
                            <select id="answer_type"
                                class=
                                'form-control  @error('a_type') is-invalid @enderror'
                                wire:model.live="a_type" name="answer_type" required>
                                <option selected value=""> -- Make Choise --</option>
                                <option value="multipleChoise"> Multiple Choise</option>
                                <option value="writting">By Writting</option>
                                <option value="attached">By Attaching File</option>
                            </select>

                        </div>

                    </div>
                </div>
                <hr>
                {{-- <div>
                    <x-label for="email" value="{{ __('Enter Question Details') }}" />
                    <textarea id="question" type="text"
                        class="w-full mt-1 border bg-white rounded text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                        class="border-gray-300 mt-1 block w-full" wire:model.defer="questionDetails"></textarea>
                </div> --}}

                <div class="my-2 border p-3 rounded">
                    <x-label for="question_title" value="{{ __(' Question Title:') }}" />
                    <textarea type="text" id="question_title" wire:model.live="question"
                        placeholder="Write Your Question Title Here .... " class="form-control @error('question') is-invalid @enderror"></textarea>
                    @error('question')
                        <strong class="text text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="my-2 border p-3 rounded bg-light" x-data="{ options: 4 }">
                    <x-label for="Options" value="{{ __('Question Options:') }}" />
                    <input type="hidden" name="oldOption[]" value="{{ $item['value'] ?? '' }}" />

                    {{-- options --}}
                    @foreach ($optionArray as $index => $val)
                        <div class="d-flex my-1 align-items-center">
                            <div>
                                <label for="optionsValue_{{ $index }}"
                                    class="input-group-text">{{ $loop->iteration }}</label>
                            </div>
                            <div class="w-80 input-group">
                                <input type="text" wire:model.live="options.{{ $index }}"
                                    name="optionValue_{{ $index }}" id="optionValue_{{ $index }}"
                                    class="form-control w-100 @error('options') is-invalid @enderror"
                                    placeholder="Option Value" />
                            </div>

                            <div class="w-20">
                                <input type="radio" wire:model.live="correct" id="correct_{{ $index }}"
                                    style="width:20px; height:20px; margin:0px 12px" value="{{ $index }}"
                                    class="@error('correct') is-invalid @enderror">
                                {{-- <button onclick="this.parentElement.parentElement.remove()" type="button"
                                    :disabled="options === 1" class="btn btn-danger mx-1">Remove</button> --}}
                            </div>

                        </div>
                    @endforeach

                    {{-- options --}}
                    {{-- <div class="d-flex my-1 align-items-center">
                        <div class="w-75">
                            <input type="text" wire:model="options" id="optionValue_2" class="form-control w-100"
                                placeholder="Option Value">
                        </div>
                        <div class="w-25 d-flex align-items-center justify-content-between">
                            <input type="checkbox" wire:model="correct" id="correct_2"
                                style="width:20px; height:20px; margin:0px 12px">
                            <button onclick="this.parentElement.parentElement.remove()" type="button"
                                :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                        </div>
                    </div> --}}

                    {{-- options --}}
                    {{-- <div class="d-flex my-1 align-items-center">
                        <div class="w-75">
                            <input type="text" wire:model="options" id="optionValue_3" class="form-control w-100"
                                placeholder="Option Value">
                        </div>
                        <div class="w-25 d-flex align-items-center justify-content-between">
                            <input type="checkbox" wire:model="correct" id="correct_3"
                                style="width:20px; height:20px; margin:0px 12px">
                            <button onclick="this.parentElement.parentElement.remove()" type="button"
                                :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                        </div>
                    </div> --}}

                    {{-- options --}}
                    {{-- <div class="d-flex my-1 align-items-center">
                        <div class="w-75">
                            <input type="text" wire:model="options" id="optionValue_4" class="form-control w-100"
                                placeholder="Option Value">
                        </div>
                        <div class="w-25 d-flex align-items-center justify-content-between">
                            <input type="checkbox" wire:model="correct" id="correct_4"
                                style="width:20px; height:20px; margin:0px 12px">
                            <button onclick="this.parentElement.parentElement.remove()" type="button"
                                :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                        </div>
                    </div> --}}


                    <button class="mt-3 btn btn-success btn-lg " type="submit">Save</button>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">

            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmQuickAddQuestion')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>


        </x-slot>
    </x-dialog-modal>
    {{-- quick add question modals --}}


    {{-- selection modal  --}}
    <x-dialog-modal wire:model="isShowSelectExamModal">

        <x-slot name="title">
            Select Exam to add question
        </x-slot>

        <x-slot name="content">

            <input type="text" wire:model.debounce.500ms="searchTerm"
                class="form-control form-control-sm w-75 border rounded-pill my-2" />
            <hr>
            <div class="block" x-data="{ select: null }">
                @foreach ($exams as $item)
                    <a wire:navigate
                        href="{{ route('vendorExamSchedule.question', ['pid' => $item->id, 'endpoint' => $item->attend_endpoint]) }}"
                        class="block mb-2 px-3 py-2 rounded-full bg-light mr-2 font-semibold">{{ $item->exm_name }}</a>

                    {{-- <div class="px-3 py-2 rounded m-2 border d-flex align-items-center">
                        <input type="radio" name="" id="selectExma_{{ $item->id }}"
                            value="{{ $item->id }}"
                            @if (null !== $select) @if ($select == $item->id)
                                    checked @endif
                        @else checked @endif
                        x-on:click="select = '{{ $item->id }}'"
                        style="width:20px; height:20px; margin-right:10px" /> --}}

                    {{-- <div class="px-3 py-2 rounded m-2 border d-flex align-items-center">
                        <input type="radio" name="" id="selectExma_{{ $item->id }}"
                            value="{{ $item->id }}" wire:model="selectedExamToAddQuestion"
                            style="width:20px; height:20px; margin-right:10px" />

                        <label for="selectExma_{{ $item->id }}"
                            class="m-0 p-0 mx-2">{{ $item->exm_name }}</label><br>
                    </div> --}}
                @endforeach
            </div>

        </x-slot>

        <x-slot name="footer">
            {{-- @if ($selectionType == 'text')
                <a href="#" class="btn btn-primary" wire:click="addTextBasedQuestion">Text Based Question</a>
            @endif

            @if ($selectionType == 'mcq')
                <a href="#" class="btn btn-info" wire:click="addMCQQuestion">Multiple Choice Question</a>
            @endif --}}

            <button class="btn btn-default btn-md" wire:click="$set('isShowSelectExamModal', false)">Close</button>
        </x-slot>
    </x-dialog-modal>
    {{-- selection modal  --}}


    {{-- view exam queston  modal --}}
    <x-modal wire:model="isShowQuestionViewModal" maxWidth="lg">

        <div class="flex justify-between items-center  p-3">
            <h5 class="m-0 text-lg">
                View Question
            </h5>

            <button class="rounded p-2 text-sm text-gray-700" wire:click="$toggle('isShowQuestionViewModal')">Close</button>
        </div>
        <hr class="my-1">

        <p class="px-2 py-1 m-0"> {{ count($viewExamQuestionData ?? []) }} Question were found</p>
        <div class="px-3 py-2">


            @foreach ($viewExamQuestionData as $item)
                <div class="flex justify-start items-start mb-3 bg-light">
                    <div class="border-r ">

                        <div class=" p-2 font-bold">
                            {{ $loop->iteration }}
                        </div>
                    </div>

                    <div class="text-left w-full">
                        <div class="border-b p-2 flex justify-between items-center">
                            <div>
                                <p class="m-0 font-bold ">
                                    {{ $item->question }}
                                </p>
                                <span class="d-inline px-2 py-1 runded border me-2"> {{ $item->type }} </span>
                            </div>

                            <div class="bg-white rounded cursor-pointer p-1">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <div class=" px-2 text-nowrap">
                                            More <i class="fas fa-caret-down ms-2"></i>
                                        </div>
                                    </x-slot>

                                    <x-slot name="content">
                                        <button class="text-left w-full px-3 py-2 border-b text-green">
                                            <i class="fas fa-pen me-2"></i> Edit
                                        </button>
                                        <button class="text-left w-full px-3 py-2 border-b  text-red">
                                            <i class="fas fa-trash me-2"></i> Delete
                                        </button>
                                    </x-slot>
                                </x-dropdown>
                            </div>

                        </div>

                        <div class="mt-1 p-2" x-data="{ isShow: false }">
                            <div class="flex justify-between items-center border-b bg-white p-2"
                                x-on:click="isShow = !isShow">
                                <div class="flex items-center">
                                    {{ count($item->options) }} - {{ $item->answer_type }} answer </p>
                                </div>
                                <p class="m-0">
                                    <i class="fas fa-caret-down"></i>
                                </p>
                            </div>

                            <div x-show="isShow" class="ms-2">

                                @foreach ($item->options as $opt)
                                    <div class="flex items-center mb-1 bg-white ">
                                        {{-- counter  --}}
                                        <div class="p-2 border-r">
                                            {{ $loop->iteration }}
                                        </div>

                                        {{-- options  --}}
                                        <div class="px-2">
                                            {{ $opt->option }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @if (empty(count($viewExamQuestionData)))
                    <div>
                        <td colspan="3 text-center text-info"> No Data Found ! </td>
                    </div>
                @endif --}}


        </div>

    </x-modal>
    {{-- view exam queston  modal --}}


    {{-- exams other info modal view --}}
    <x-dialog-modal wire:model="confrmInfoModal">
        <x-slot name="title">
            Exam Other Information View
        </x-slot>

        <x-slot name="content">
            @if ($moreInfoData)
                <div class="rounded border ms-1 px-2 py-1 my-2 d-inline-block">
                    <td class="rounded bg-info d-block">TYPE :</td>
                    <td>{{ Str::upper($moreInfoData['exm_type_of']) }}</td>
                    <td>{{ Str::upper($moreInfoData['exm_type']) }} </td>
                </div>
                <br>
                <div class="rounded text-white bg-success ms-1 px-2 py-1 my-2 d-inline-block">
                    <td>Total Marks :</td>
                    <td>{{ $moreInfoData['total_mark'] }}</td>
                </div>
                <div class="rounded text-white bg-success ms-1 px-2 py-1 my-2 d-inline-block">
                    <td>Total Question :</td>
                    <td> {{ $moreInfoData['total_question'] ?? 'will view on question section' }} </td>
                </div>
                <div class="rounded text-white bg-success ms-1 px-2 py-1 my-2 d-inline-block">
                    <td>Pass Mark :</td>
                    <td> {{ $moreInfoData['pass_mark'] }} </td>
                </div>

                <hr />
                <div class="row m-0">


                    <div class="col-md-5">
                        <table class="table table-bordered">
                            <tr>
                                <td>Start Date & Time :</td>
                                <td> {{ $moreInfoData['link_open_at'] }} </td>
                            </tr>
                            <tr>
                                <td>End Date & Time :</td>
                                <td> {{ $moreInfoData['link_close_at'] }} </td>
                            </tr>
                            <tr>
                                <td>Duration:</td>
                                <td>
                                    {{ $moreInfoData['exm_duration'] }} Miutes
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class="col-md-6 ">
                        <table class="table table-bordered table-striped">
                            <tr class="table-success font-bold">
                                <td>Marks Per Question :</td>
                                <td>{{ $moreInfoData['for_cr'] }}</td>
                            </tr>
                            <tr class="table-danger">
                                <td>Cut mark for wrong Answer :</td>
                                <td class="">{{ $moreInfoData['for_wr'] }}</td>
                            </tr>
                            <tr class="table-danger">
                                <td>Cut mark for skip Question :</td>
                                <td>{{ $moreInfoData['for_skp'] }}</td>
                            </tr>
                        </table>

                    </div>





                </div>
                <hr />

                <div class="rounded border ms-1 px-2 py-1 my-2 d-inline-block">
                    <td class="rounded bg-info d-block">REASULT PUBLISHED DATE :</td>
                    <td>{{ Str::upper($moreInfoData['result_published_on'] ?? 'not definde') }}</td>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <button type="button" class="btn btn-success btn-md"> <i class="fas fa-save me-2"></i> Update and
                Save</button>

            <button type="button" class="btn btn-default mx-2 btn-md"
                wire:click="$set('confrmInfoModal', false)">close</button>
        </x-slot>
    </x-dialog-modal>
    {{-- exams other info modal view --}}
</div>
