<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="content-wrapper p-3">

        <!-- header -->
        <nav class=" navbar navbar-expand ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link active">Exam Schedule</a>
                </li>
            </ul>
        </nav>

        <!-- main content -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header ">

                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <div class="h4">
                                Make Exam Shedule
                            </div>
                            <div>

                                <button class="btn btn-sm rounded btn-primary" wire:click="re_set"> <i
                                        class="fas fa-sync me-2"></i> Reset</button>
                            </div>
                        </div>
                    </div>

                    {{-- @if ($group->count() >= 1) --}}

                    <div class="card-body">
                        <form wire:submit="submitScheduleForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exm_type">Exam Type :</label>
                                    <select wire:model.live="exm_type" id="exm_type"
                                        class="form-contro form-select @error('exm_type') is-invalid @enderror">
                                        <option value="">Define Exam Type</option>
                                        <option value="1">MCQ</option>
                                        <option value="2">Written</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="eam_name" class="from-label">Exam Name :</label>
                                    <input type="text" wire:model.live="eam_name" id="eam_name"
                                        placeholder="Monthly exam, weekly exam, class test "
                                        class="form-control @error('eam_name') is-invalid  @enderror">
                                </div>
                                <hr>
                                <div class="col-sm-4 my-2">
                                    <label for="exm_subject" class="from-label">Subject :</label>
                                    <input type="text" wire:model.live="exm_subject"
                                        placeholder="Math, Bangoli, History " id="exm_subject"
                                        class="form-control  @error('exm_subject') is-invalid  @enderror">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="g_id" class="from-label ">Select Group :</label>
                                    <div class="input-group">
                                        <select wire:model.live="g_id" id="g_id"
                                            class="form-control @error('g_id') is-invalid @enderror">
                                            @if (count($group) > 0)
                                                @foreach ($group as $gp)
                                                    {{-- <option value="{{ $gp->id }}"> {{ $gp->gp_name }} </option> --}}
                                                    <option value=""> {{ $gp }} </option>
                                                @endforeach
                                            @else
                                                <option value="">No Group Found ! </option>
                                            @endif
                                        </select>
                                        @if (count($group) < 1)
                                            <button type="button" wire:click="addGroup"
                                                class="d-inline btn-sm btn-primary input-gropu-text"> <i
                                                    class="fas fa-plus"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="exm_date" class="from-label">Exam Date :</label>
                                    <input type="date" wire:model.live="exm_date" id="exm_date"
                                        class="form-control form-date @error('exm_date') is-invalid @enderror">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="exm_start" class="from-label">Start Time :</label>
                                    <input type="time" wire:model.live="exm_start" id="exm_start"
                                        class="form-control @error('exm_start') is-invalid @enderror">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="exm_duration" class="from-label">Exam Duration (minute) :</label>
                                    <input type="number" wire:model.live="exm_duration" id="exm_duration"
                                        class="form-control @error('exm_duration') is-invalid @enderror">
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 my-2">
                                        <label for="for_cr" class="from-label">For Correct (Point):</label>
                                        <input type="text" wire:model.live="for_cr" id="for_cr" value="1"
                                            class="form-control @error('for_cr') is-invalid @enderror">
                                        <div class="form-text">How many point add for correct answer.</div>
                                    </div>
                                    <div class="col-sm-4 my-2">
                                        <label for="for_wr" class="from-label">For Incorrect (Point):</label>
                                        <input type="text" wire:model.live="for_wr" id="for_wr" value="0"
                                            class="form-control @error('for_wr') is-invalid @enderror">
                                        <div class="form-text">How many point cut for incorrect answer.</div>
                                    </div>
                                    <div class="col-sm-4 my-2">
                                        <label for="for_skp" class="from-label">For Skip (Point):</label>
                                        <input type="text" wire:model.live="for_skp" id="for_skp"
                                            value="0"
                                            class="form-control @error('for_skp') is-invalid @enderror">
                                        <div class="form-text">How many point cut if skip a question.</div>
                                    </div>
                                </div>

                                <div class="p-2 my-2 ">
                                    <input type="checkbox" name="is_published" id="is_published" class="me-3">
                                    <label for="is_published ">Published Now !</label>
                                    <div class="form-text">
                                        If you published this exam, then it will be visible to all registered user in
                                        the system.Check this box if you want to publish the exam.
                                    </div>
                                </div>

                                <div class="col-12 my-2 w-100">
                                    <button class="btn btn-info btn-md float-right">
                                        <i class="fas fa-copy mr-2"></i> Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- @else
                        <div class="card-body">
                            <div class="alert alert-info w-100">
                                You have no student group. please create student group first to criate a exam routine. <a href="{{ route('teacherStudentGroup.create') }}" >Create A Group</a>
                </div>
            </div>
            @endif --}}
                </div>

            </div>
        </div>
