@extends('layouts.vendor.app')

@section('title')
    Vendor || Edit Question
@endsection

@section('content')
    @livewire('vendor.questions.edit', ['quid' => $qid])
@endsection
