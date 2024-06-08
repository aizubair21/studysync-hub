@extends('layouts.vendor.app')
@section('title')
    Test master page reload or not
@endsection

@section('content')
    <div>
        <x-content-header>
            <li class="breadcrumb-item active">
                Test Master
            </li>
        </x-content-header>
        <a href="#" wire:navigate class="btn btn-md m-2 btn-info">Back</a>
        <p class="alert alert-info">This is master test page</p>

        <x-banner style="success">
            @section('title')
                test banner card
            @endsection
        </x-banner>
    </div>
@endsection
