@extends('layouts.vendor.app')
@section('title')
    Vendor > Schedule > Question
@endsection

@section('content')
    @livewire('vendor.exams-schedule.schedule-questions', ['eid' => $id])
@endsection
