@extends('auth.student.student')
@section('title')
    Exam result > student panel
@endsection
@section('content')
<div class=" p-2">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4>Review Student Exam</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Exam</a></li>
                <li class="breadcrumb-item ">Review</li>
                <li class="breadcrumb-item ">{{ $student->name }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <pre>

        {{-- {{
            print_r($student)
        }} --}}
    </pre>
    <div class="card">
        <div class="w-100 bg-info text-light p-2 text-center"> Your Result</div>
        <div class="card-body">
            
            <div class="row">
                {{-- left quick view --}}
                <div class="col-sm-6 mt-2">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <input type="text" value="Total Question  :" class="form-control bg-light" readonly >
                                <label for="" class="input-group-text">{{ ($result->correct + $result->incorrect + $result->skiped) }}</label>
                            </div>
            
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input type="text" value="Total Mark :" class="form-control bg-light" readonly >
                                <label for="" class="input-group-text">{{ $result->total_mark }}</label>
                            </div>
        
                        </div>
                        <br>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <td>Name</td>
                            <td>Value</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Correct Answer :</td>
                                <td>{{$result->correct}}</td>
                            </tr>
                            <tr>
                                <td>Incorrect Answer :</td>
                                <td>{{$result->incorrect}}</td>
                            </tr>
                            <tr>
                                <td>Skipped Question :</td>
                                <td>{{$result->skiped}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
        
                        <div class="col-md-12">
                            <div class="input-group bg-light">
                                <input type="text" value="Correct Answer :" class="form-control text-light bg-success" readonly >
                                <label for="" class="input-group-text bg-success text-light">{{ $result->correct }}</label>
                            </div>
                            <span>
                                <i class="fas fa-check-circle text-success"></i> is the student correct answer.
                                <br>
                                <span class="text-info">Green background mentioned as the main correct answer. </span>
                            </span>
        
                        </div>
        
                        <div class="col-md-12 py-2">
                            <div class="input-group">
                                <input type="text" value="Wrong Answer :" class="form-control bg-danger text-light" readonly >
                                <label for="" class="input-group-text bg-danger text-light  ">{{ $result->incorrect }}</label>
                            </div>
                            <span class="form-text">
                                <i class="fas fa-circle-xmark text-danger"></i> check this.
                            </span>
        
                        </div>
        
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" value="Skipped Question :" class="form-control bg-info text-light" readonly >
                                <label for="" class="input-group-text bg-info text-light">{{ $result->skiped }}</label>
                            </div>
        
                        </div>
                       
                    </div>

                </div>

                {{-- progress section start --}}
                <div class="col-sm-6 mt-2">

                    <div class="">
                        <div class="card card-danger " id="cart">
                            <div class="card-header">
                              <h3 class="card-title">Exam Progress</h3>
              
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" style="height: 250px;width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>

                {{-- body row end --}}
            </div>

            {{-- card body end --}}
        </div>
    </div>
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
                        @php  $sai = 'border border-danger'; @endphp
                    
                    @endif
                @endforeach
            @endforeach

        <div class="col-lg-6">
            <div class="card {{$sai}}">
                <div class="card-body d-flex align-items-start ">
                    <div class="p-2 mr-1 bg-success text-light rounded ">
                        Q{{$qs++}}.
                    </div>
                    <div class="w-100">
                        <input type="text" name="q[{{ $qsa->id }}]" id="q{{$qsa->id}}" value="{{ $qsa->question }}" readonly class="form-control w-100">
                        
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
@push('script')
<script>
      const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'polarArea',
  data: {
    labels: ['Correct', 'Incorrect', 'Skipped'],
    datasets: [{
      label: '',
      data: [{{$result->correct}}, {{$result->incorrect}}, {{$result->skiped}}],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
@endpush
@endsection