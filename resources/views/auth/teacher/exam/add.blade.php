@extends('auth.teacher.teacher')
@section('title')
Add Exam Shedult > Teacher Control
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header ">
    
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div>
                            Make Exam Shedule
                        </div>
                        <a href="{{route('teacherExamShedule.index')}}" class="btn btn-primary btn-sm float-right">All Exam</a>
                    </div>
                </div>
                @if ($group->count() >= 1)
                    <div class="card-body">
                        <form action="{{ route('teacherExamShedule.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exam_type">Exam Type :</label>
                                    <select name="exam_type" id="exam_type" class="form-contro form-select">
                                        <option value="">Define Exam Type</option>
                                        <option value="1">MCQ</option>
                                        <option value="2">Written</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="username" class="from-label">Exam Name :</label>
                                    <input type="text" name="exam_name" id="examname" placeholder="Monthly exam, weekly exam, class test " class="form-control @error('exam_name') is-invalid  @enderror" value="{{ old('exam_name') }}">
                                </div>
                                <hr>
                                <div class="col-sm-4 my-2">
                                    <label for="name" class="from-label">Subject :</label>
                                    <input type="text" name="exam_subject" id="name" placeholder="Math, Bangoli, History " class="form-control  @error('exam_subject') is-invalid  @enderror" value="{{ old('exam_subject') }}">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="group" class="from-label ">Select Group :</label>
                                    <select name="group" id="group" class="form-control @error('group') is-invalid @enderror">
                                        <option value="">Select Student Group</option>
                                        @if ($group->count() > 0)
                                        @foreach ($group as $gp)
                                        <option value="{{ $gp->id }}"> {{ $gp->gp_name }} </option>
                                        @endforeach
                                        @else
                                        <option value="">No Group Found !</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="phone" class="from-label">Exam Date :</label>
                                    <input type="date" name="examdate" id="phone" class="form-control @error('examdate') is-invalid @enderror" value="{{ old('examdate') }}">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="email" class="from-label">Start Time :</label>
                                    <input type="time" name="startime" id="email" class="form-control @error('startime') is-invalid @enderror" value="{{ old('startime') }}">
                                </div>
                                <div class="col-sm-4 my-2">
                                    <label for="email" class="from-label">Exam Duration (minute) :</label>
                                    <input type="number" name="totaltime"  id="email" class="form-control @error('totaltime') is-invalid @enderror" value="{{ old('totaltime') }}">
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 my-2">
                                        <label for="number" class="from-label">For Correct (Point):</label>
                                        <input type="text" name="for_correct" id="number" value="1"  class="form-control @error('totaltime') is-invalid @enderror" value="{{ old('totaltime') }}">
                                        <div class="form-text">How many point add for correct answer.</div>
                                    </div>
                                    <div class="col-sm-4 my-2">
                                        <label for="incorrect" class="from-label">For Incorrect (Point):</label>
                                        <input type="text" name="for_incorrect" id="incorrect" value="0" class="form-control @error('totaltime') is-invalid @enderror" value="{{ old('totaltime') }}">
                                        <div class="form-text">How many point cut for incorrect answer.</div>
                                    </div>
                                    <div class="col-sm-4 my-2">
                                        <label for="skip" class="from-label">For Skip (Point):</label>
                                        <input type="text" name="for_skip" id="skip" value="0" class="form-control @error('totaltime') is-invalid @enderror" value="{{ old('totaltime') }}">
                                        <div class="form-text">How many point cut if skip a question.</div>
                                    </div>
                                </div>

                                <div class="col-12 my-2 w-100">
                                    <button class="btn btn-primary btn-md float-right">
                                    <i class="fas fa-copy mr-2"></i>     Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <div class="alert alert-info w-100">
                            You have no student group. please create student group first to criate a exam routine. <a href="{{ route('teacherStudentGroup.create') }}" >Create A Group</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection