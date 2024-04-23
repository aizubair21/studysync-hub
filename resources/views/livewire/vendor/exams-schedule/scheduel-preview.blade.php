<div>
    <div class="content-wrapper px-1 py-2">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Studysync-hub</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a wire:navigate href="#">Dash</a></li>
                            <li class="breadcrumb-item"><a wire:navigate
                                    href="{{ route('vendorGroup.index') }}">Groups</a></li>
                            <li class="breadcrumb-item"><a wire:navigate
                                    href="{{ route('vendorExamSchedule.index') }}">Exams</a></li>
                            <li class="breadcrumb-item ">
                                <a href="" wire:navigate>{{ $schedule->exm_name }}</a>
                            </li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <hr>

        <!-- Main content -->

        {{-- top header  --}}
        <div class="row m-0">
            <div class="col-md-6">
                <div class="d-flex">
                    {{-- <img src="https://avatars.githubusercontent.com/img/{{$schedule->id}}" alt="" class="rounded-circle border shadow" style="width:80px; height:80px"> --}}
                    {{-- <img src="https://loremflickr.com/640/480?lock=1234" alt="" --}}
                    <img src="https://loremflickr.com/100/100/perticle" alt=""
                        class="rounded-circle border shadow" style="width:80px; height:80px">
                    <div class="ms-2">
                        <h3>{{ Str::upper($schedule->exm_name) }}</h3>
                        <div class="d-inline-block px-2 py-1 bg-info text-light rounded border">
                            {{ Str::upper($schedule->exm_type_of) }}
                            >
                            {{ Str::upper($schedule->exm_type) }}
                        </div>

                        <div class="d-inline-block px-2 py-1 bg-success text-light rounded border mx-1">
                            <i class="fas fa-book me-1"></i> {{ Str::upper($schedule->exm_subject) }}
                        </div>

                        <div class="d-inline-block px-2 py-1 bg-success text-light rounded border mx-1">
                            <i class="fas fa-users me-1"></i> Group: {{ Str::upper($schedule->group['name']) }}
                        </div>
                    </div>
                </div>
                <br>
                <div class="input-group bg-white p-2">
                    <div class="input-group-text bg-success text-light"> <i class="fas fa-eye me-1"></i>
                        {{ $schedule->status }}</div>
                    <form action="" method="post" class="m-0">
                        <div class="d-flex">

                            <select name="" id="update_status" class="form-control form-select">
                                <option value=""> -- select an option --</option>
                                <option value="Pending"> Pending</option>
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                                <option value="Published">Published</option>
                            </select>
                            @csrf
                            <button class="btn btn-default">Applay</button>
                        </div>
                    </form>
                </div>
                <div class="p-2 mt-1 bg-white mb-1 d-flex">
                    <div>
                        <i class="fas fa-plus me-1"></i> Added on : {{$schedule->created_at}}
                    </div>
                    <div class="ms-2">
                        <i class="fas fa-sync me-1"></i> Last Modified : {{ $schedule->updated_at }}
                    </div>
                </div>


            </div>

            <div class="col-md-6">
                <table class="table table-bordered bg-info">
                    <tr>
                        <th>Correct</th>
                        <th>Wrong</th>
                        <th>Skip</th>
                    </tr>
                    <tr>
                        <td>+ {{ $schedule->for_cr }}</td>
                        <td>- {{ $schedule->for_wr ?? '0' }}</td>
                        <td>- {{ $schedule->for_skp ?? '0' }}</td>
                    </tr>
                </table>
            </div>
            {{-- <a href="{{ route('restRediraction') }}" wire:navigate>test redirection</a> --}}


        </div>
        {{-- top header  --}}
        <hr>

        {{-- section div --}}
        <section x-data='{isShowAbout:false}'>

            <div class="btn btn-default w-100 text-start p-2 pe-3 rounded my-1">

                <div class=" text-left d-flex justify-content-between align-items-center cursor-pointer"
                    @click="isShowAbout = !isShowAbout">
                    {{-- Left  --}}
                    <div class="d-flex sm:mb-1 ">
                        <div class="p-2 rounded bg-green-50 me-2 fs-1 d-flex justify-content-center align-items-center"
                            style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 01 </div>
                        <div>
                            <div class="h5 m-0">About</div>
                            <p class="m-0">Abou Marking, Time and Function </p>
                        </div>
                    </div>
                    {{-- left  --}}

                    {{-- right --}}
                    <i x-show="isShowAbout" class=" me-3 fas fa-angle-down" style="font-size:20px"></i>
                    <i x-show="!isShowAbout" class=" me-3 fas fa-angle-right" style="font-size:20px"></i>
                    {{-- right --}}
                </div>

                {{-- start show about  --}}
                <div x-show="isShowAbout" x-transition class="text-left">
                    <hr>
                    <div class="d-inline-block shadow-sm border border-primary px-2 py-1 rounded m-1 ">
                        {{ Str::upper($schedule->total_mark) }} Marks
                    </div>
                    <div class="d-inline-block shadow-sm border border-primary px-2 py-1 rounded m-1 ">
                        <i class="fas fa-question me-1"></i> {{ count($schedule->questions) }} Questions
                    </div>

                    <div class="d-inline-block shadow-sm border border-primary px-2 py-1 rounded m-1 ">
                        <i class="fas fa-clock me-1"></i> {{ Str::upper($schedule->exm_duration) }} minutes
                    </div>

                    <div class="d-inline-block px-2 bg-info py-1 rounded border m-1 ">
                        Exam Data : {{ Str::upper($schedule->exm_date) }}
                    </div>

                    <div class="d-inline-block px-2 py-1 rounded border m-1 ">
                        <i class="fas fa-clock me-1"></i> Exam start at : {{ Str::upper($schedule->exm_time) }}
                    </div>
                    <div class="d-inline-block px-2 py-1 rounded border m-1 ">
                        <i class="fas fa-clock me-1"></i> Exam end at : {{ Str::upper($schedule->exm_time) }}
                    </div>


                    <hr>
                    <label for="keyNote">Exm Note:</label>
                    <textarea name="" id="keyNote" class="form-control">{{ $schedule->exm_key_note }}</textarea>
                    <hr>

                </div> 
                {{-- end show about  --}}

                {{-- end section div --}}
            </div>

            <a href=""
                class="btn btn-default text-left p-2 pe-3 rounded my-1 d-flex justify-content-between align-items-center">
                {{-- Left  --}}
                <div class="d-flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-50 me-2 fs-1 d-flex justify-content-center align-items-center"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 02 </div>
                    <div>
                        <div class="h5 m-0">Questions</div>
                        <p class="m-0">View all questions, add, change</p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <i class="me-3 fas fa-angle-right" style="font-size:20px"></i>
                {{-- right --}}
            </a>

            <a href=""
                class="btn btn-default text-left p-2 pe-3 rounded my-1 d-flex justify-content-between align-items-center">
                {{-- Left  --}}
                <div class="d-flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-50 me-2 fs-1 d-flex justify-content-center align-items-center"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 03 </div>
                    <div>
                        <div class="h5 m-0">Response</div>
                        <p class="m-0">Student attandance on </p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <i class="me-3 fas fa-angle-right" style="font-size:20px"></i>
                {{-- right --}}
            </a>

            <a href=""
                class="btn btn-default text-left p-2 pe-3 rounded my-1 d-flex justify-content-between align-items-center">
                {{-- Left  --}}
                <div class="d-flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-50 me-2 fs-1 d-flex justify-content-center align-items-center"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 04 </div>
                    <div>
                        <div class="h5 m-0">Result</div>
                        <p class="m-0">Make result and Published </p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <i class="me-3 fas fa-angle-right" style="font-size:20px"></i>
                {{-- right --}}
            </a>

        </section>
        {{-- section div --}}

        {{-- danger zone  --}}
        <section class="bg-danger text-light p-3 rounded my-3">
            <h3 class="font-upper"> Danger Zone</h3>
            <p>
                If you delete this data, you will not be able to recover it. Please make sure before deleting
                anything.This is the dangerous part of your dashboard.
            </p>
            <form action="" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-light">Delete this EXAM SCHEDULE</button>
            </form>
        </section>
        {{-- danger zone  --}}

        {{-- Main content --}}
    </div>
</div>
