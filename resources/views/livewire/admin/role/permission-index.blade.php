<div>
    <div class="content-wrapper px-4 py-2">

        {{-- header  --}}
        <nav class=" navbar navbar-expand">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a wire:navigate href="{{ route('instructor-dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('adminRole.index') }}" class="nav-link active">Rols and Permissions</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link active">Permissions</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item me-2">
                    <button class="btn btn-info  mb-2"> <i class="fas fa-filter ms-1"></i> Filter</button>
                </li>
                <li class="nav-item">
                    <input type="search" wire:model="search_exam" id="" class=" form-control form-search"
                        placeholder="Search by exan name, subject, group......">
                </li>
            </ul>
        </nav>
        {{-- ./header  --}}


        <div class="row m-0">
            <div class="col-md-6">
                <div class="d-flex">

                    <div class="input-group">
                        <button class="btn btn-sm btn-warning" wire:click="getData"> <i class="fas fa-sync"></i> Refresh
                            Data </button>
                        <button class="btn btn-info btn-sm my-2 my-md-0 mx-1"
                            wire:click="$toggle('confirmNewPermissionModal')"> <i class="fas fa-plus"></i> New
                            Permission </button>
                    </div>
                    {{--                     
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#assignRoleModel" > <i class="fas fa-link"></i> Assign role </button>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#assignPermissionToUserModel" > <i class="fas fa-link"></i> Assign Permission </button> --}}
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="input-group">

                    <input type="search" wire:model="search_permission" class="form-control form-search"
                        id="">
                    <button class="btn btn-sm btn-info input-group-text"> <i class="fas fa-search"></i> </button>
                </div>
            </div>
        </div>
        <hr>

        {{-- assign permission to a user --}}
        <a wire:navigate href=""
            class="d-flex text-dark shadow justify-content-between align-items-center p-3 rounded bg-white my-2 ">
            <div class="left">
                <x-section-title>
                    <x-slot name="title">
                        Assign Permission
                    </x-slot>
                    <x-slot name="description">
                        Assign Permission to a user, delete
                    </x-slot>
                </x-section-title>
            </div>
            <div class="right">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        {{-- @livewire('admin.role.perms-to-role-form') --}}
        {{-- assign permission to a user --}}


        {{-- permission table --}}
        <div class="overflow-x-scroll bg-white p-1 scrolbar-none shadow-sm rounded">
            <x-section-title class="shadow">
                <x-slot name="title">
                    Permissions
                </x-slot>
                <x-slot name="description">
                    View all permission to have, edit or delete
                </x-slot>
            </x-section-title>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>A/C</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($permissions as $id => $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->name }}</td>
                            {{-- convert database data to local timezone --}}
                            {{-- <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->timezone(config('app.timezone'))->format('Y-M-D, H:i') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->updated_at)->timezone(config('app.timezone'))->format('Y-M-D, H:i') }}
                            </td> --}}
                            <td>
                                <button type="button" wire:click="updatePermission({{ $item->id }})"
                                    class=" rounded-circle shadow btn btn-sm btn-info"> <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" wire:click="deltePermission({{ $item->id }})"
                                    class=" rounded-circle shadow btn btn-sm btn-danger"> <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{-- permission table --}}


        {{-- assign permission to a role --}}
        {{-- assign permission to a role --}}
    </div>


    {{-- add new permission --}}
    <div class="modal" id="addPermissionModel" aria-labelledby="addPermissionModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPermissionModelLabel"> Add Permission :</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <x-dialog-modal wire:model.live="confirmNewPermissionModal">
        <x-slot name="title">
            Add New Permission
        </x-slot>
        <x-slot name="content">
            <div>
                @livewire('Admin.Role.PermissionForm')
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$toggle('confirmNewPermissionModal')">Close</button>
        </x-slot>
    </x-dialog-modal>

    {{-- @include('components.assetsComponents') --}}
