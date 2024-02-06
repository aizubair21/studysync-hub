@extends('master')

@section('title')
    Congratulation
@endsection

@section('content')

<div class="w-100 text-center d-flex justify-content-center align-items-center">
    <div>
        <h1>Congratulation</h1>
        <p>You have successfully finished your exam. You were notice your exam's review.</p>
        <button class="btn btn-success btn-lg continue">Continue</button>
    </div>
</div>

@push('script')
<script>
    $('.continue').click(function (e) {
        window.close();
    });    
</script>    
@endpush
@endsection