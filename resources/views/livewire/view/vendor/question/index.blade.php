@extends('layouts.vendor.app')
@section('title')
    Show Question
@endsection

@section('content')
    @livewire('vendor.questions.index', ['eid' => $id])
@endsection
