@extends('layouts.vendor.app')
@section('title')
    Vendor section
@endsection

@section('content')
    {{-- @livewire('vendor.dashboard', ['user' => $user], key($user->id)) --}}
    <div>
        @livewire('vendor.dashboard')
    </div>
@endsection
