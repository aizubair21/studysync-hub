@extends('auth.teacher.teacher')
@section('title')
    Notice > teacher control
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('teacherNotice.store') }}" method="post">
                        @csrf
                        <div>
                            <div>
                                <label for="noticeFor">How can see this notice :</label>
                                
                            </div>
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" name="target_all" class="form-input" id="target_all" value="2">
                                    <label for="target_all">To All Student</label>
                                </div>
                                <div>
                                    OR
                                    @php 
                                        $groups = DB::table('groups')->where('gp_modaretor', Auth::id())->get();
                                    @endphp
                                </div>
                                <div style="width:50%">
                                    
                                    <label for="notifierFor">Select A Group: </label>
                                    <select name="target_group" id="noticeFor" class="form-control">
                                        <option value="">Select Group</option>
                                        @foreach ($groups as $gp)
                                        <option value="{{ $gp->id }}">{{ $gp->gp_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <hr>

                        </div>
                        <div class="my-2">
                            <label for="title">Notice Title :</label>
                            <input type="text" name="title" id="title" placeholder="notice title" class="form-control">
                        </div>
                        <div class="my-1">
                            <label for="desc">Notice :</label>
                            <textarea name="notice" id="notice" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="w-100 mt-2">
                            <button class="btn btn-primary btn-lg float-right" >Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection