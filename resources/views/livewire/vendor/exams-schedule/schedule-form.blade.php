<div>

    @section('title')
        Vendor > Schedule Create
    @endsection


    <div class="">

        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif
        @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="flex justify-between items-center text-red-900 text-red px-2 py-1 text-sm font-bold" >
                            
                            <div class="">
                                {{ $error }}
                            </div>

                            <button onclick="this.parentElement.remove()" class="p-1 w-4 rounded bg-gray-200">
                                X
                            </button>
                            
                        </li>
                       @if (!$loop->last)
                        <hr>
                       @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


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
    <!-- /.navbar -->


    <div class="mb-5 bg-white">
        <div class="flex justify-between items-center p-4">

            <div>
                <div class="text-md font-bold ">Schedule Create</div>
                <div class="text-sm rounded-full bg-slate-300 px-3 py-1 inline-flex">Index</div>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="h-8 w-8 rounded-full bg-slate-200 hover:bg-slate-500 me-2 hover:text-slate-50">
                    <img src="{{asset('media/settings-white.png')}}" alt="">
                </button>
                <a href="" class="px-3 py-1 rounded-full bg-green-900 text-white">Import</a>
            </div>
        </div>

        <div class="mt-3 flex items-center justify-center">
        </div>

    </div>


    <div  x-data="{type: 'mcq', type_of: 'standard', starndard: '',}" style="width: 100%; max-width:500px; margin: 0 auto">
        {{-- {{count($groups)}} --}}
        <form wire:submit="submitScheduleForm('mcq', 'standard')">

            <div class="text-sm" >
                <div class="bg-white rounded">
                    <div class="px-4 py-3 my-2">
                        <div class="text-md font-bold my-2 px-2">Exam Name</div>
                        @error('exm_name')
                            <strong class="block text-red-200">{{$message}}</strong>
                        @enderror
                        <input type="text" placeholder="Ex: Annual Final Exam"
                            class="w-full p-2 rounded p-1 border text-sm" id="" wire:model="exm_name">
                    </div>
                </div>
        
                <div class="rounded">
                        
        
                    <div class="bg-white rounded m-1">
        
                        <div class="py-3 px-4 my-2 ring-red-800">
            
                            <div class="my-2 px-2 flex items-center justify-between">
            
                                <div class=" font-bold text-md">
                                    Your Group
                                </div>
                                <div>
                                    <select wire:model.live="group" class="w-48 rounded border p-2 @error('group') font-bold text-sm text-red-900 outline-red-900 @enderror" id="">
                                        <option value=""> - Select a group -</option>
                                        @foreach ($groups as $gp)
                                            <option @selected($gpid == $gp->id) value="{{$gp->id}}">{{$gp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
            
                            <div>
                                <div class="text-sm">
                                    Define your targeted group to create an exam schedule.
                                </div>
                            </div>
            
                        </div>
                        <hr class="my-1 h-1">
            
                        <div class="">
                            <div class="w-full py-3 px-4 my-1 md:flex justify-between items-center">
                                <div class="text-md font-bold text-nowrap my-2 px-2">Exam Type</div>
                                <select wire:model="exm_type" disabled class="w-full md:w-48 p-2 border rounded" id="">
                                    <option value="" selected >Multiple Choise</option>
                                    <option value="">-- Written --</option>
                                </select>
                            </div>
                            <hr class="my-1">
                            <div class="w-full py-3 px-4 my-1 md:flex justify-between items-center">
                                <div class="text-md font-bold text-nowrap my-2 px-2">Exam Type</div>
                                <select wire:model="exm_type_of" disabled class="w-full md:w-48 p-2 border rounded " id="">
                                    <option value="" selected >Standard</option>
                                </select>
                            </div>
                            <hr class="my-1">
                            <div class="w-full py-3 px-4 my-1">
                                <div class="text-md font-bold text-nowrap my-2 px-2">Exam Subject</div>
                                <textarea wire:model="exm_subject" placeholder="Ex: English Grammer" class="w-full p-2 rounded border" rows="1"
                                    id=""></textarea>
                            </div>
                        </div>
            
                    </div>

                     <!-- pas mark, total mark  -->
                     <div class="bg-white rounded m-1">
                        <div class=" px-3 py-4 my-1 ">
                            <div class="flex justify-between items-center">
                                <div class="px-2 my-1 text-md font-bold">Total Question</div>
                                <input type="number" wire:model="total_question" class="w-24  border rounded p-2" id="" placeholder="100">
                            </div>
                            <div class="p-2 text-sm">
                                How many question wanna add this schedule.
                            </div>
                        </div>
                        <hr class="my-1">
            
                        <div class=" px-3 py-4 my-1 ">
                            <div class="flex justify-between items-center">
                                <div class="px-2 my-1 text-md font-bold">Pass Mark</div>
                                <input type="text" wire:model="pass_mark" class="w-24  border rounded p-2" id="" placeholder="40">
                            </div>
                            <div class="p-2 text-sm">
                                A minimum number required to pass this exam
                            </div>
                        </div>
                        <hr class="my-1">
            
                        <div class=" px-3 py-4 my-1 ">
                            <div class="flex justify-between items-center">
                                <div class="px-2 my-1 text-md font-bold">Total Mark</div>
                                <input type="number" wire:model="total_mark" class="w-24  border rounded p-2" id="" value="1">
                            </div>
                            <div class="p-2 text-sm">
                                Get Number against a correct answer.
                            </div>
                        </div>
            
                    </div>
        
                    <!-- exam marking, date, time, duration  -->
                    <div class="bg-white rounded m-1">
            
                        <div class="px-3 py-4 my-2">
                            <div class="px-2 my-1 text-md font-bold">Exam Marking</div>
                            <div class="">
            
                                <div class=" p-2 my-1 ">
                                    <div class="flex justify-between items-center">
                                        <div class="px-2 my-1 text-md font-bold">Correct</div>
                                        <input type="number" wire:model="for_cr" class="w-24  border rounded p-2" id="" value="1">
                                    </div>
                                    <div class="p-2 text-sm">
                                        Get Number against a correct answer.
                                    </div>
                                </div>
                                <hr>
            
                                <div class="p-2 my-1">
                                    <div class="flex justify-between items-center">
                                        <div class="px-2 my-1 text-md font-bold">Wrong</div>
                                        <input type="text" wire:model="for_wr" class="w-24  border rounded p-2" id="" value="1">
                                    </div>
                                    <div class="p-2 text-sm">
                                        Cut Number against a wrong answer.
                                    </div>
                                </div>
                                <hr>
            
                                <div class="p-2 my-1">
                                    <div class="flex justify-between items-center">
                                        <div class="px-2 my-1 text-md font-bold">Skip</div>
                                        <input type="text" wire:model="for_skp" class="w-24  border rounded p-2" id="" value="0">
                                    </div>
                                    <div class="p-2 text-sm">
                                        Cut Number against a skip question.
                                    </div>
                                </div>
            
                            </div>
                        </div>
                    </div>
                    
        
                    <!-- date -->
                    <div class="bg-white rounded m-1">
                        <div class="px-3 py-4 my-2">
                            <div class="md:flex md:justify-between md:items-start">
                                <div class="text-md font-bold text-nowrap my-1 px-2">Exam Date</div>
                                <input type="date" wire:model="exm_date" class="w-full md:w-48 p-2 rounded border" id="">
                            </div>
                            <div class="p-2 text-sm">
                                Exam start date.
                            </div>
                        </div>
                        <hr class="my-1 h-1">
            
                        <div class="px-3 py-4 my-2">
                            <div class="md:flex md:justify-between md:items-start">
                                <div class="text-md font-bold text-nowrap my-1 px-2">Start Time</div>
                                <input type="time" wire:model="link_open_at" class="w-full md:w-48 p-2 rounded border" id="">
                            </div>
                            <div class="text-sm p-2">
                                Exam start time. On start time an student can access the exam.
                            </div>
                        </div>
                        <hr class="my-1 h-1">
            
                        <div class="px-3 py-4 my-2">
                            <div class="md:flex md:justify-between md:items-start">
                                <div class="text-md font-bold text-nowrap my-1 px-2">Duration </div>
                                <input type="text" wire:model="exm_duration" placeholder="Ex: 60 minute" class="w-full md:w-48 p-2 rounded border"
                                    id="">
                            </div>
                            <div class="text-sm p-2">
                                Duration must be munite.
                            </div>
                        </div>
                    </div>
            
        
                    <!-- result published  -->
                    <div class="bg-white rounded m-1">
            
                        <div class="px-3 py-4 my-2">
                            <div class="md:flex md:justify-between md:items-start">
                                <div class="text-md font-bold text-nowrap my-1 px-2">Result Published </div>
                                <input type="date" wire:model="result_published_on" placeholder="Ex: 60 minute" class="w-full md:w-48 p-2 rounded border"
                                    id="">
                            </div>
                            <div class="text-sm p-2">
                                Determined when result will be published. It represent that the user can review their exam after
                                published the result.
                            </div>
                        </div>
                        <hr class="my-1 h-1">
            
            
                        <div class="px-3 py-4 my-2">
                            <div class="md:flex md:justify-between md:items-start">
                                <div class="text-md font-bold text-nowrap my-1 px-2">Exam Close </div>
                                <input type="date" wire:model="link_close_at" placeholder="Ex: 60 minute"
                                    class="w-full md:w-48 p-2 rounded border" id="">
                            </div>
                            <div class="text-sm p-2">
                                Determined when result will be published. It represent that the user can review their exam after
                                published the result.
                            </div>
                        </div>
                    </div>
        
                        
                    <!-- settings  -->
                    <div class="bg-white rounded m-1">
                        <div class="px-3 py-4">
                            <div class="p-2 my-1 text-md font-bold">General Settings </div>
                            <div class="p-2 my-1">
                                <div class="">
                                    <div class="flex justify-between items-center">
                                        <div class="p-2 my-1 text-md">Unchangable Option</div>
                                        <input type="checkbox" wire:model="Is_prevent_change_option" class="w-5 h-5" id="">
                                    </div>
                                    <div class="p-2 text-sm">
                                        wanna prevent to change option if one is selected.
                                    </div>
                                </div>
                            </div>
                            <hr class="my-1">
                
                            <div class="p-2 my-1">
                                <div class="flex justify-between items-center">
                                    <div class="p-2 my-1 text-md">Randomized Question</div>
                                    <input type="checkbox" wire:model="ransomized_question" class="w-5 h-5" id="">
                                </div>
                                <div class="p-2 text-sm">
                                    wanna prevent to change option if one is selected.
                                </div>
                            </div>
                            <hr class="my-1">
                
                            <div class="p-2 my-1">
                                <div class="flex justify-between items-center">
                                    <div class="p-2 my-1 text-md">Window Track</div>
                                    <input type="checkbox" wire:model="window_track" class="w-5 h-5" id="">
                                </div>
                                <div class="p-2 text-sm">
                                    wanna prevent to change option if one is selected.
                                </div>
                            </div>
                            
                            <hr class="my-1">
                            <div class="p-2 my-1">
                                <div class="flex justify-between items-center">
                                    <div class="p-2 my-1 text-md">Window Track</div>
                                    <input type="checkbox" wire:model="mouse_track" class="w-5 h-5" id="">
                                </div>
                                <div class="p-2 text-sm">
                                    wanna prevent to change option if one is selected.
                                </div>
                            </div>
        
                        </div>
            
                    </div>
                        
        
            
                </div>
            </div>

            <div class="flex justify-end items-center my-2">
                <button type="submit" class="px-4 py-3 text-md font-bold bg-green-900 text-white rounded"> Save </button>
            </div>
        </form>

    </div>


    <div class="hidden"  x-data="{
        type: 'mcq',
        type_of: 'minimal',
        starndard: '',
    
    }"> 

        <!-- main content -->
        <div class="flex justify-center" >
            <div class="w-full">
                <div class="card mt-2 shadow-0">
                    <div class="card-header border-0">

                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <div class="h4">
                                Make Exam Shedule
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-sm rounded btn-success mx-2" wire:click="$refresh"> <i
                                        class="fas fa-sync me-2"></i> refresh</button>

                                <button class="btn btn-sm rounded btn-primary" wire:click="re_set"> <i
                                        class="fas fa-sync me-2"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- fi any error show the error message --}}
                @if ($errors->any())
                    <div class="alert alert-warning col-8 mx-auto my-3 text-center">
                        <strong>Warning!</strong> Please check your inputs.
                    </div>
                    @foreach ($errors->getMessages() as $field => $error)
                        <div class="alert alert-danger col-6 mx-auto my-2">
                            <span class="fw-bold h5">{{ $field }} :</span>
                            @foreach ($error as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endforeach
                @endif
                {{-- loop throught error and show  them one by one --}}

                <form wire:submit="submitScheduleForm(type, type_of)" id="scheduleForm">

                    {{-- exam necessary info  --}}
                    <div class="card shadow-none">
                        <div class="card-header">
                            <i class="fas fa-caret-right me-2"></i> Exam Type
                        </div>

                        <div class="card-body bg-light py-2">

                            @csrf
                            <div class="md:flex items-center justify-between">

                                <div class="md:w-2/5 border border-primay p-3 shadow-sm">
                                    {{-- select info --}}
                                    <div class="mt-2">
                                        <div x-show="type_of == 'standard'" x-transition
                                            class=" p-2 border-info border-start" style="border-left:2px solid">
                                            starndard means include all feature avaiable
                                        </div>
                                        <div x-show="type_of == 'minimal'" x-transition
                                            class=" p-2 border-info border-start" style="border-left:2px solid">
                                            Minimal a MCQ setup. You can consider it instant making a exam.
                                        </div>
                                        <div x-show="type_of == 'custom'" x-transition
                                            class=" p-2 border-info border-start" style="border-left:2px solid">
                                            Setup your own choise.
                                        </div>
                                        <div x-show="type_of == 'attached'" x-transition
                                            class=" p-2 border-info border-start" style="border-left:2px solid">
                                            Examinee must attached a file to answer.
                                        </div>
                                        <div x-show="type_of == 'write_instant'" x-transition
                                            class=" p-2 border-info border-start" style="border-left:2px solid">
                                            Examinee write the instant answer to answer field.
                                        </div>
                                    </div>

                                    {{-- mcq or written --}}
                                    <div class="col-12 my-2 d-flex justify-content-start align-items-center">
                                        <div class="rounded py-3 px-3 relative m-2 " style="background-color:white">
                                            <div class=" d-flex align-items-center  justify-content-between">
                                                <input type="radio" selected id="mcq" x-model="type"
                                                    value="mcq"
                                                    class=" form-input me-2 @error('exm_type') is-invalid @enderror">
                                                <label class="d-block p-0 m-0" for="mcq">MCQ </label>
                                            </div>
                                        </div>
                                        <div class="rounded py-3 px-3 relative m-2 " style="background-color:white">
                                            <div class=" d-flex align-items-center  justify-content-between">
                                                <input type="radio" id="written" x-model="type"
                                                    x-on:click="type_of = ''" value="written"
                                                    class=" form-input me-2">
                                                <label class="d-block p-0 m-0" for="written">WRITTEN
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    @error('exm_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    {{-- mcq other option --}}
                                    <div x-show="type == 'mcq'" x-transition class="pb-3">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div
                                                class="d-flex align-items-center bg-light border-primary justify-content-center m-2 py-2 px-2">
                                                <input type="radio" x-model="type_of" id="standard"
                                                    value="standard"
                                                    class="me-2 @error('exm_type_of') is-invalid @enderror"
                                                    wire:model="exm_type_of">
                                                <label for="standard" class="m-0 p-0 fs-2 d-block">Stardard</label>
                                            </div>
                                            <div
                                                class="d-flex align-items-center bg-light border-primary justify-content-center m-2 py-2 px-2">
                                                <input type="radio" x-model="type_of" id="minimal"
                                                    value="minimal"
                                                    class="me-2 @error('exm_type_of') is-invalid @enderror"
                                                    wire:model="exm_type_of">
                                                <label for="minimal" class="m-0 p-0 fs-2 d-block">Minimal</label>
                                            </div>
                                            <div
                                                class="d-flex align-items-center bg-light border-primary justify-content-center m-2 py-2 px-2">
                                                <input type="radio" x-model="type_of" id="custom"
                                                    value="custom"
                                                    class="me-2 @error('exm_type_of') is-invalid @enderror"
                                                    wire:model="exm_type_of">
                                                <label for="custom" class="m-0 p-0 fs-2 d-block">Custom</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- written option --}}
                                    <div x-show="type != 'mcq'" x-transition class="pb-3">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div
                                                class="d-flex align-items-center bg-light border-primary justify-content-center m-2 py-2 px-2">
                                                <input type="radio" x-model="type_of" id="attached"
                                                    value="attached"
                                                    class="me-2 @error('exm_type_of') is-invalid @enderror"
                                                    wire:model="exm_type_of">
                                                <label for="attached" class="m-0 p-0 fs-2 d-block">Attached</label>
                                            </div>
                                            <div
                                                class="d-flex align-items-center bg-light border-primary justify-content-center m-2 py-2 px-2">
                                                <input type="radio" x-model="type_of" id="write_instant"
                                                    value="write_instant"
                                                    class="me-2 @error('exm_type_of') is-invalid @enderror"
                                                    wire:model="exm_type_of">
                                                <label for="write_instant" class="m-0 p-0 fs-2 d-block">Write
                                                    Instant</label>
                                            </div>
                                        </div>
                                    </div>

                                    @error('exm_type_of')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                </div>

                                <div class="md:w-2/5 py-3 p-sm-3">
                                    <label for="exm_note">Exm Note : </label>
                                    <textarea id="exm_note" wire:model="exm_note" class="form-control" rows="7"></textarea>
                                    <div class="form-text text-info">
                                        exam note for next time to see what on you mind had. Only exam
                                        creator can see
                                        this.
                                    </div>
                                </div>

                                <div class="md:w-1/5">
                                    <div class="text-center border border-primary shadow-sm rounded p-3">
                                        <input type="checkbox" wire:model="is_retake" id="is_retake"
                                            class="form-control" style="width:50px; height:50px; margin: 5px auto;">
                                        <label for="is_retake">Check, If this exam scheduled to take a
                                            retake
                                            exam.</label>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    {{-- basic info  --}}
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-caret-right me-2"></i> Basic Info
                        </div>
                        <div class="card-body">
                            <div class="flex">

                                <div class="w-full my-2">
                                    <label for="exm_subject" class="from-label">Exam subject :</label>
                                    <input type="text" wire:model="exm_subject" autocomplete="true"
                                        id="exm_subject" placeholder="Monthly exam, weekly exam, class test "
                                        @class([
                                            'form-control',
                                            'is-invalid' => $errors->has('exm_subject'),
                                        ])>
                                    {{-- <x-error field="exm_subject" /> --}}
                                    @error('exm_subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text text-info">
                                        Give the anme of your exam. ex: Annual exam, Class test, etc.
                                    </div>
                                </div>

                                <div class="w-1/3 my-2">
                                    <label for="exm_subject" class="from-label">Subject :</label>
                                    <input type="text" wire:model="exm_subject"
                                        placeholder="Math, Bangoli, History " id="exm_subject"
                                        @class(['form-control', 'is-invalid' => $errors->has('exm_subject')])>
                                    @error('exm_subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-1/3 my-2">
                                    <label for="exm_function" class="form-label">Functional :</label>
                                    <select disabled wire:model="exm_function" id="exm_functional"
                                        @class(['form-control form-select'])>
                                        <option value="">-- select functionality --</option>
                                        <option selected value="0">With Default</option>
                                        <option value="1">Custom</option>
                                    </select>
                                </div>

                                <div class="w-1/3 my-2 my-2">
                                    <label for="exm_date" class="from-label">Exam Date :</label>
                                    <input type="date" wire:model="exm_date" id="exm_date"
                                        @class(['form-control', 'is-invalid' => $errors->has('exm_date')])>
                                    @error('exm_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="row my-2">
                                <div class="col-md-4 my-2">
                                    <label for="exm_start" class="from-label">Start Time :</label>
                                    <input type="time" wire:model.live="exm_start" id="exm_start"
                                        class="form-control @error('exm_start') is-invalid @enderror">
                                    @error('exm_start')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4  my-2">
                                    <label for="exm_duration" class="from-label">Exam Duration (minute)
                                        :</label>
                                    <input type="number" wire:model="exm_duration" id="exm_duration"
                                        class="form-control @error('exm_duration') is-invalid @enderror">
                                    @error('exm_duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 my-2" x-data="{ isShow: false }">

                                    <label for="group" class=" ">Select Group :</label>

                                    <div class="input-group">
                                        <select wire:model="group" id="group"
                                            class="form-control @error('group') is-invalid @enderror">
                                            @if (count($groups) > 0)
                                                @foreach ($groups as $gp)
                                                    {{-- <option value="{{ $gp->id }}"> {{ $gp->gp_wire:model }} </option> --}}
                                                    <option value="{{ $gp->id }}">
                                                        {{ $gp->name }} </option>
                                                @endforeach
                                            @else
                                                <option value="">No Group Found ! </option>
                                            @endif
                                        </select>
                                        <button type="button" x-on:click="isShow = ! isShow"
                                            class="d-inline btn-sm btn-primary input-gropu-text"> <i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="input-group my-2" x-show="isShow" x-transition>
                                        <input type="text" class="form-control" placeholder=""
                                            >
                                        <button type="button" wire:click="createInstantGroup"
                                            class="input-group-text">
                                            <i class="fas fa-plus me-2"></i>
                                            Add
                                        </button>
                                    </div>
                                    @error('group')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- exam marking --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card shadow-none   bg-light">
                                <div class="card-header">
                                    <i class="fas fa-caret-right me-2"></i> Exam Mark and Validate
                                </div>

                                <div class="card-body">
                                    <div class=" m-0">
                                        <div class="d-flex justify-content-between align-items-start my-4">
                                            <div>
                                                <label for="pass_mark" class="from-label">Pass Mark
                                                    (MARK):</label>
                                                <div class="form-text text-info">Minimal number to pass
                                                    this exam.
                                                </div>
                                            </div>
                                            <input type="text" wire:model="pass_mark" id="pass_mark"
                                                value="0" @class(['rounded ', 'is-invalid' => $errors->has('pass_mark')])>
                                        </div>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-start my-4">
                                            <div>
                                                <label for="total_mark" class="from-label">Total Mark
                                                    (MARK):</label>
                                                <div class="form-text text-info">Total mark of exam, it's
                                                    optional at
                                                    the
                                                    time of
                                                    MCQ. But, in written you must give exam total mark. In
                                                    MCQ option,
                                                    total
                                                    mark
                                                    must be matched with the correct question mark.</div>

                                            </div>
                                            <input type="number" wire:model="total_mark" id="total_mark"
                                                value="0"
                                                class=" rounded @error('total_mark') is-invalid @enderror">
                                        </div>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-start my-4">
                                            <div>
                                                <label for="total_question" class="from-label">Total
                                                    Question
                                                    (count):</label>
                                                <div class="form-text text-info">Total question of exam.
                                                    it's optional.
                                                    if
                                                    you not
                                                    defined ti, total question will be counted from question
                                                    table
                                                    belongs
                                                    to this
                                                    exam .</div>

                                            </div>
                                            <input type="number" wire:model="total_question" id="total_question"
                                                value="0"
                                                class="rounded  @error('total_question') is-invalid @enderror">
                                        </div>
                                        <hr>

                                    </div>

                                </div>
                            </div>


                        </div>
                        <div x-show="type == 'mcq'" x-transition class="col-md-5">
                            <div>
                                <div class="card">
                                    <div class="card-header">
                                        MCQ Mark Calculate
                                    </div>

                                    <div class="card-body">
                                        <div class=" m-0">

                                            <div class="d-flex justify-content-between align-items-start my-2">
                                                <div>
                                                    <label for="for_cr" class="from-label">For Correct
                                                        (Point):</label>
                                                    <div class="form-text">How many point add for correct
                                                        answer.</div>

                                                </div>
                                                <input type="text" wire:model="for_cr" id="for_cr"
                                                    value="1"
                                                    class="rounded @error('for_cr') is-invalid @enderror">
                                                @error('for_cr')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-start my-2">
                                                <div>
                                                    <label for="for_wr" class="from-label">For Incorrect
                                                        (Point):</label>
                                                    <div class="form-text">How many point cut for incorrect
                                                        answer.
                                                    </div>

                                                </div>
                                                <input type="text" wire:model="for_wr" id="for_wr"
                                                    value="0"
                                                    class="rounded @error('for_wr') is-invalid @enderror">
                                            </div>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-start my-2">
                                                <div>
                                                    <label for="for_skp" class="from-label">For Skip
                                                        (Point):</label>
                                                    <div class="form-text">How many point cut if skip a
                                                        question.</div>

                                                </div>
                                                <input type="text" wire:model="for_skp" id="for_skp"
                                                    value="0"
                                                    class="rounded @error('for_skp') is-invalid @enderror">
                                            </div>
                                            <hr>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- exam closing function --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow-0  border">
                                <div class="card-header">
                                    <i class="fas fa-caret-right me-2"></i> Exam Close and Result
                                </div>

                                <div class="card-body">

                                    <div>
                                        <label for="exm_end_at">Link Close :</label>
                                        <input type="time" wire:model.live="exm_end_at" id="exm_end_at"
                                            @class([
                                                'form-control form-date',
                                                'is-invalid' => $errors->has('exm_end_at'),
                                            ])>
                                        @error('exm_end_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text text-info">
                                            Set a time from when examinee can't attend exam. or exam has
                                            been stooped
                                            anyone can't attend to exam.
                                        </div>

                                    </div>

                                    <div class="my-2">
                                        <label for="result_published_at">Result Pubished :</label>
                                        <input type="date" id="result_published_at" class="form-control">
                                        @error('result_published_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text text-info">
                                            When exam result will be published. Untill the published result
                                            student
                                            can't
                                            review there own result
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                        {{-- exam scurity --}}
                        <div class="col-md-8">
                            <div class="card shadow-0  border">
                                <div class="card-header">
                                    <i class="fas fa-caret-right me-2"></i> Exam Security
                                </div>
                                <div class="card-body">

                                    <div class="my-2">
                                        <div class="d-flex ">
                                            <input type="checkbox" id="is_changable_option" class="me-2">
                                            <div>
                                                <label for="is_changable_option">Is Changable
                                                    Option</label>
                                                <div class="form-text">
                                                    wanna prevent to change option if one is selected.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="my-2">

                                        <div class="d-flex ">
                                            <input type="checkbox" id="randomized_question" class="me-2">
                                            <div>
                                                <label for="randomized_question">Randomized
                                                    Question</label>
                                                <div class="form-text">
                                                    Specify is question comes with random order. every
                                                    student get with
                                                    random
                                                    order.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="my-2">

                                        <div class="d-flex ">
                                            <input type="checkbox" id="mouse_track" class="me-2">
                                            <div>
                                                <label for="mouse_track">Mouse Track in Answer
                                                    Sheet.</label>
                                                <div class="form-text">
                                                    Is mouse trakced on answer sheet? as soon as mouse gove
                                                    out of
                                                    answer sheet
                                                    a alert will throw immediately. Doing more of three
                                                    times, exa will
                                                    be
                                                    submitted.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="my-2">
                                        <div class="d-flex ">
                                            <input type="checkbox" id="separate_window" class="me-2">
                                            <div>
                                                <label for="separate_window">On private window </label>
                                                <div class="form-text">
                                                    Exam will be conducted on a separate window, so that you
                                                    can keep
                                                    this window open and continue to exam.
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-0 bg-light">
                        <div class="card-body">
                            <div class="p-2 my-2 ">
                                <input type="checkbox" wire:model="is_published" id="is_published" class="me-3"
                                    style="width:25px; height:25px;">
                                <label for="is_published ">Published Now !</label>
                                <div class="form-text">
                                    If you published this exam, then it will be visible to all registered
                                    user in
                                    the system.Check this box if you want to publish the exam.
                                </div>
                            </div>

                            <div class=" my-2 w-100">
                                <button class="btn btn-info btn-lg float-right">
                                    <i class="fas fa-save mr-2"></i> Create
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        
    </div>


</div>