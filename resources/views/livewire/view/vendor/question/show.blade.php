@extends('layouts.vendor.app')
@section('title')
    Question
@endsection

@section('content')
    @livewire('vendor.questions.show', ['qid' => $id, 'isHeader' => true])
@endsection
