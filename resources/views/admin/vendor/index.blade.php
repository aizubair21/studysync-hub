@extends('auth.app')
@section('content')
<div class="content-wrapper p-2">
    {{-- @livewire('component', ['user' => $user], key($user->id)) --}}

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate  href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Vendors</li>
          {{-- <li class="breadcrumb-item active" aria-current="page">Vendor</li> --}}
        </ol>
    </nav>

    <div class="row my-3">
        
        <div class="col-md-4">
            <button class="btn btn-md btn-success"> Vendor </button>
        </div>
        <div class="col-md-4 ">
            <div class="input-group">
                <input type="text" placeholder="Search..." class="form-control  border-0 shadow-sm" wire:model='search'>
                <button class="input-group-text">check</button>
            </div>
        </div>
        
        <div class="col-md-4 d-inline-flex">

            <!-- Button trigger modal -->
            <button class="btn btn-md btn-info mx-2 mx-sm-0 rounded-circle  my-2 my-sm-0"> <i class="fas fa-sync"></i> </button>
            <a wire:navigate href="{{route("adminVandor.create")}}" class="btn btn-md btn-outline-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Add Vendor </a>
        </div>
    </div>

    @livewire('admin.user.usertable')
</div>
@push('script')

@endpush
@endsection