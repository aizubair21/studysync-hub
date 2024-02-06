@extends('auth.teacher.teacher')
@section('title')
    Student connect with parent > Teacher Control
@endsection
@section('content')
<div class="content-wrapper p-2">
<div class="row justify-content-center">
    <div class="col-md-4 mt-4">
        <div class="card ">
            <div class="w-100 p-3">
                Connect parent with his child
            </div>
            <div class="card-body"> 
                <form action="{{ route('parentConnect.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="parent" class="from-cotrol">Select Parent :</label>
                        <select name="p_id" id="parent" class="form-control @error('parent') is-invalid @enderror ">
                            <option disabled selected value="">Select Parent</option>
                            @foreach ($parent as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-1">
                        <label for="student">Select Student :</label>
                        <select name="s_id" id="student" class="form-control  @error('student') is-invalid @enderror">
                            <option disabled selected value="">Select student</option>
                            @foreach ($student as $s)
                                <option value="{{ $s->id }}"> {{ $s->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 w-100">
                        <button type="submit" class="btn btn-info btn-sm float-right" >Connect</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection