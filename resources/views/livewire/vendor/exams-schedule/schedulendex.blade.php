<div>

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


    <div x-data="{
        activeNav: 'all',
        activeContent: 'all',
        isFilter: false,
        selectedId: [],
        filter_by_date: null,
        filter_by_group: null,
        filter_by_status: 'all',
    
    
    }">

        <!-- Content Header (Page header) -->
        <x-content-header>
            <li class="breadcrumb-item active">
                Exams Index
            </li>
        </x-content-header>
        <!-- /.content-header -->


        {{-- hidden action center  --}}

        <div class=" d-inline-flex bg_light scrolbar-none" style="width:100%; overflow-x:scroll;" x-data={}>
            {{-- <div class=" btn btn-lg m-2 mx-3 border-primary p-3" wire:click="$refresh"> <i class="fas fa-carret-down"></i> Draft --}}
            <button x-show="selectedId.length == 1" href="" role="button"
                class=" text-nowrap btn d-block border-bottom m-2 btn-success"
                @click="$wire.addQuestionModal(selectedId)">
                <i class="fas fa-pen me-2"></i>
                Make Question
            </button>

            {{-- trash  --}}
            <button x-show="selectedId.length > 0" x-transition type="button" class=" text-nowrap btn btn-danger m-2"
                @click="$wire.distroy(selectedId)"> <i class="fas fa-trash me-2"></i> Trash
            </button>

            {{-- draft --}}
            <button x-show="selectedId.length > 0" x-transition type="button"
                class=" text-nowrap text-nowrap btn btn-outline-info m-2" @click="$wire.draft(selectedId)"> <i
                    class="fas fa-arrow-down me-2"></i> Draft</button>

            {{-- published exam --}}
            <button x-show="selectedId.length > 0" x-transition type="button" href=""
                class=" text-nowrap  btn btn-outline-success m-2" @click="$wire.doPublishedExam(selectedId)">
                <i class="fas fa-sync me-2"></i> Publish
            </button>

            {{-- live exam  --}}
            <button x-show="selectedId.length > 0" x-transition type="button" href=""
                class="  text-nowrap btn btn-success m-2" @click="$wire.doLiveExam(selectedId)">
                <i class="fas fa-play me-2"></i> Live
            </button>


        </div>
        {{-- hidden action center --}}

        {{-- table data filter nav --}}
        <div class="d-flex align-items-center" style="overflow-x: scroll">


            <button x-show="!isFilter" @click="isFilter = !isFilter" x-transition
                class="py-2 px-3 bg-info border-0 mx-1 cursor-pinter rounded text-nowrap sticky start-0">
                <i class="fa fa-filter me-2"></i> filter
            </button>

            <button x-show="isFilter" @click="isFilter = !isFilter" x-transition
                class="py-2 px-3 bg-info border-0 mx-1 cursor-pinter rounded text-nowrap sticky start-0">
                <i class="fa fa-align-justify me-2"></i> Tab
            </button>

            {{-- tab  --}}
            <div x-show="!isFilter" x-transition>
                <div class="d-flex  m-0  w-100 my-2 py-1 ">
                    <div class="py-2 px-3 text-nowrap cursor-pointer rounded  mx-1  border-bottom"
                        :class="{ 'bg-success': activeNav == 'all' }" @click="activeNav = 'all'">All</div>

                    <div class="py-2 px-3 text-nowrap cursor-pointer rounded  mx-1  border-bottom"
                        :class="{ 'bg-success': activeNav == 'drafted' }" @click="activeNav = 'drafted'">Draft
                    </div>

                    <div class="py-2 px-3 text-nowrap cursor-pointer rounded  mx-1  border-bottom"
                        :class="{ 'bg-success': activeNav == 'published' }" @click="activeNav = 'published'">Published
                    </div>

                    <div class="py-2 px-3 text-nowrap cursor-pointer rounded  mx-1  border-bottom"
                        :class="{ 'bg-success': activeNav == 'live' }" @click="activeNav = 'live'">Live
                    </div>

                    <div class="py-2 px-3 text-nowrap cursor-pointer rounded  mx-1  border-bottom"
                        :class="{ 'bg-success': activeNav == 'Resulted' }" @click="activeNav = 'Resulted'">Result out
                    </div>
                </div>
            </div>

            {{-- flter and action section --}}
            <div x-show="isFilter" x-transition>

                <div class="d-flex  m-0  w-100 my-2 py-1 ">

                    <select name="" id="by_subject" class="form-select rounded mx-1" v-model="filters_by_group">
                        <option selected value="*"> -- All Group --</option>
                        @foreach ($groups as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                        @endforeach
                    </select>

                    <select name="filter_by_date" id="group_by" x-model="filter_by_date"
                        class=" form-select rounded mx-1">
                        <option selected value="*">All Time</option>
                        <option value="today">Today</option>
                        <option value="tomorrow">Tomorrow</option>
                        <option value="weekly">This Week</option>
                        <option value="weekly">Next Week</option>
                        <option value="monthly">This Month</option>
                    </select>

                </div>
            </div>

        </div>
        {{-- table data filter nav end --}}

        {{-- table --}}
        <div class="w-100 overflow-scroll pb-3 px-2">
            <table class="table  text-center " id="dataTables_simple">
                <thead>
                    <tr>
                        <x-th scope="col ">A/C</x-th>
                        <x-th scope="col " style=" min-width:30px; width:30px">#</x-th>
                        <x-th scope="col " style=" min-width:150px">Name</x-th>
                        <x-th scope="col " style=" min-width:150px">Group</x-th>
                        <x-th scope="col " style=" min-width:150px">Exam Time</x-th>
                        <x-th scope="col " style=" min-width:150px">Status</x-th>
                        <x-th scope="col " style=" min-width:180px">Exam Date</x-th>
                        <x-th scope="col " style=" min-width:150px">Last Modified</x-th>
                        <x-th>Questions</x-th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($exams))

                        @foreach ($exams as $id => $item)
                            <tr>

                                <x-td class=" align-items-center">
                                    <div class="d-inline-flex align-items-center">

                                        <div>
                                            <input type="checkbox" id="inp_{{ $item->id }}"
                                                name="inp_{{ $item->id }}" x-model="selectedId"
                                                value="{{ $item->id }}">
                                        </div>

                                    </div>

                                </x-td>
                                <x-td>
                                    <div class="d-inline-flex align-items-center">{{ $loop->iteration }}</div>
                                </x-td>
                                <x-td for="inp_1">
                                    <div>
                                        <a href="{{ route('vendorExamSchedule.view', ['pid' => $item->id, 'endpoint' => $item->attend_endpoint]) }}"
                                            wire:navigate>
                                            {{ $item->exm_name }}
                                        </a>
                                    </div>
                                    <div class="d-inline-flex align-items-center mt-2">

                                        <a wire:navigate
                                            href="{{ route('vendorExamSchedule.edit', ['id' => $item->id]) }}"
                                            class="btn btn-sm btn-info mx-1"> Edit </a>
                                        <button class="btn btn-sm btn-info text-nowrap"
                                            wire:click="showMoreInfo({{ $item->id }})"> <i
                                                class="fas fa-eye me-1"></i> Quick View
                                        </button>
                                    </div>
                                </x-td>
                                <x-td>
                                    <p class="m-0 mb-1">

                                        {{ $item->group['name'] }}
                                    </p>

                                    <p class="m-0 small text-muted rounded bg-info d-inline w-auto p-1 ">
                                        {{ $item->exm_subject }}
                                    </p>
                                </x-td>
                                <x-td>
                                    {{ $item->exm_time }}
                                </x-td>
                                <x-td>
                                    {!! $item->status !!}
                                </x-td>
                                <x-td> <span class="border border-info px-2 py-1 rounded-pill text-nowrap">
                                        {{ $item->exm_date }}</span></x-td>
                                <x-td>{{ $item->updated_at }}</x-td>
                                <x-td>
                                    <div class="d-inline-flex ">

                                        {{-- <button type="button" title="quick add question"
                                            class=" text-nowrap btn text-priamry "
                                            wire:click="$toggle('confirmQuickAddQuestion')">
                                            <i class="fas fa-plus"></i> Quick
                                        </button> --}}

                                        {{-- <a wire:navigate href="" title="Add question with full of featured"
                                            role="button" class=" text-nowrap btn btn-success ms-1 ">
                                            <i class="fas fa-plus me-2"></i>Add
                                        </a> --}}

                                        <buton title="view quesiton of this exams" role="button"
                                            wire:click="showQuestionViewModal({{ $item->id }})"
                                            class=" text-nowrap btn rounded-circle btn-success mx-1 ">
                                            <i class="fas fa-eye"></i>
                                        </buton>

                                        {{-- <buton title="view quesiton of this exams" role="button"
                                            wire:click="showQuestionViewModal({{ $item->id }})"
                                            class=" text-nowrap btn btn-outline-success mx-1 ">
                                            <i class="fas fa-sync me-2"></i> View Response
                                        </buton> --}}
                                        <a href="" wire:navigate title="Add new question"
                                            class="btn btn-outline-primary"> <i class="fas fa-plus"></i> </a>

                                    </div>
                                </x-td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" class="text-center ">No Data Found!</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

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
                                <input type="radio" x-show="$wire.options.{{ $index }} !=  null "
                                    wire:model.live="correct" id="correct_{{ $index }}"
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
            <div class="d-inline-flex" x-data="{ select: null }">
                @foreach ($exams as $item)
                    {{-- <a href="#" wire:click="selectExam({{ $item->id }})"
                        class="bg-primary text-white px-4 py-2 rounded-xl mr-2 font-semibold">{{ $item->name }}</a>
                    class="bg-dark text- --}}
                    {{-- <div class="px-3 py-2 rounded m-2 border d-flex align-items-center">
                        <input type="radio" name="" id="selectExma_{{ $item->id }}"
                            value="{{ $item->id }}"
                            @if (null !== $select) @if ($select == $item->id)
                                    checked @endif
                        @else checked @endif
                        x-on:click="select = '{{ $item->id }}'"
                        style="width:20px; height:20px; margin-right:10px" /> --}}

                    <div class="px-3 py-2 rounded m-2 border d-flex align-items-center">
                        <input type="radio" name="" id="selectExma_{{ $item->id }}"
                            value="{{ $item->id }}" wire:model="selectedExamToAddQuestion"
                            style="width:20px; height:20px; margin-right:10px" />

                        <label for="selectExma_{{ $item->id }}"
                            class="m-0 p-0 mx-2">{{ $item->exm_name }}</label><br>
                    </div>
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

            <button class="btn btn-success mx-2 btn-md" wire:click="confirmSelectedExamToQuickAddQuestion">Add
                Question</button>
            <button class="btn btn-default btn-md" wire:click="$set('isShowSelectExamModal', false)">Close</button>
        </x-slot>
    </x-dialog-modal>
    {{-- selection modal  --}}


    {{-- view exam queston  modal --}}
    <x-dialog-modal wire:model="isShowQuestionViewModal">
        <x-slot name="title">
            View Question
            <br>
            <p class="px-2 py-1 rounded bg-info  d-inline h6"> {{ count($viewExamQuestionData ?? []) }} Question were
                found
                associated
                with this exam.</p>
        </x-slot>
        <x-slot name="content">
            <div class="d-flex align-items-center">
                {{-- <input type="search" name="" id="searchQuestion" class="w-50 rounded-full " autofocus> --}}
            </div>

            <div class="overflow-x-scroll my-2">

                <table class="table table-striped">

                    @foreach ($viewExamQuestionData as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td style="text-align: start!important">
                                {{ $item->question }}
                                <p class="d-inline px-2 py-1 runded border mx-2"> {{ $item->type }} </p>
                                <br>
                                <div class="d-flex">

                                    <p class="d-inline-block px-2 py-1 rounded bg-success text-white">
                                        {{ count($item->options) }} Options</p>
                                    <p class="d-inline-block px-2 py-1 runded border mx-2">
                                        {{ $item->answer_type }} answer </p>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm rounded-full border-0 bg-danger text-white"> <i
                                        class="fas fa-minus"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                    @if (empty(count($viewExamQuestionData)))
                        <tr>
                            <td colspan="3 text-center text-info"> No Data Found ! </td>
                        </tr>
                    @endif

                </table>

            </div>


        </x-slot>

        <x-slot name="footer">
            <button type="button" class="btn btn-danger"
                wire:click="$set('isShowQuestionViewModal', false)">Close</button>
        </x-slot>
    </x-dialog-modal>
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
