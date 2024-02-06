@extends('auth.teacher.teacher')
@section('title')
    Student Exam Reivew > teacher control
@endsection

@section('content')
<div class="content-wrapper p-2">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Review Student Exam</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Exam</a></li>
                <li class="breadcrumb-item active">Review</li>
                <li class="breadcrumb-item active">{{ $student->name }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <div class="row">
        @php 
        $qs = 1;
        $sai = '';
        @endphp
        @foreach ($questions as $qkey => $qsa)
            
        
            @foreach ($qsa->answers as $akey => $ans)             
                    @foreach ($student_answers as $sakey => $sans)
                        @if (($sans->a_id == $ans->id) && $ans->is_correct == 1)
                            @php $sai = 'border border-success'; @endphp
                        @elseif (($sans->a_id == $ans->id) && $ans->is_correct != 1)
                            @php  $sai = 'border border-info'; @endphp
                        
                        @endif
                    @endforeach
            @endforeach

        <div class="col-lg-6">
            <div class="card {{$sai}}">
                <div class="card-body d-flex align-items-start">
                    <div class="p-2 mr-1 bg-success text-light rounded ">
                        Q{{$qs++}}.
                    </div>
                    <div>
                        <input type="text" name="q[{{ $qsa->id }}]" id="q{{$qsa->id}}" value="{{ $qsa->question }}" readonly class="form-control">
                        
                        {{-- answers  --}}
                       <div class="mt-3">
                           @php 
                                $qa = 1;
                                $isCorA = "";
                            
                            @endphp
                            @foreach ($qsa->answers as $akey => $ans)
                                <span class="p-2 @if($ans->is_correct == 1) bg-success @endif " style="border:1px solid gray; margin-right:2px">
                                    {{ $ans->option }}
                                
                                    @foreach ($student_answers as $sakey => $sans)
                                        @if (($sans->a_id == $ans->id) && $ans->is_correct == 1)
                                            
                                            <i class="fas fa-check"></i>
                                        @endif
                                        @if (($sans->a_id == $ans->id) && $ans->is_correct != 1)
                                            <i class="fas fa-circle-xmark text-danger"></i>
                                        @endif

                                    @endforeach
                                
                                </span>
                                
                            @endforeach
                       </div>
                    </div>
                </div>
            </div>
        </div>
        @php $sai++ @endphp
        @endforeach
    </div>
    

    <pre>
        @php 
            // echo $sai;
            // print_r($student_answers)
        @endphp
    </pre>
</div>
@endsection