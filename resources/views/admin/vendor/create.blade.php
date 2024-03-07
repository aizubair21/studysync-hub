@extends('layouts.app')
@section('content')
    <div class="content-wrapper p-2">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a wire:navigate href="{{ route('adminVandor.index') }}">Vendors</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Vendors</li> --}}
                <li class="breadcrumb-item active" aria-current="page">Add new vendor</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-6">
                @livewire('admin.user.vendorform')
            </div>
            <div class="col-md-6">
                @livewire('admin.user.usertable')
                {{-- @livewire('admin.user.usertable') --}}
            </div>
        </div>
    </div>
@endsection
