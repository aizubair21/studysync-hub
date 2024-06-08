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
                    <a href="#" class="nav-link active">Rols and Permissions</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item me-2">
                    <button class="btn btn-info  mb-2"> <i class="fas fa-filter ms-1"></i> Filter</button>
                </li>
                <li class="nav-item">
                    <input type="search" id="" class=" form-control form-search"
                        placeholder="Search by exan name, subject, group......">
                </li>
            </ul>
        </nav>
        {{-- ./header  --}}

        <div class="row m-0 py-2  border-top border-bottom py-3">
            <div class="col-md-6">
                <div class="d-flex">

                    <button class="btn btn-success btn-sm my-2 my-md-0 mx-1"
                        wire:click="$toggle('confirmNewRoleModal')"> <i class="fas fa-plus"></i> New Role </button>
                    <button class="btn btn-info btn-sm my-2 my-md-0 mx-1"
                        wire:click="$toggle('confirmNewPermissionModal')"> <i class="fas fa-plus"></i> New Permission
                    </button>

                </div>
            </div>
            <div class="col-md-6 text-start  text-md-end">
                <button class="btn btn-sm btn-outline-primary" wire:click="$toggle('confirmAssignRoleToUserModal')">
                    <i class="fas fa-link"></i> Assign role </button>
                <button class="btn btn-sm btn-primary" wire:click="$toggle('confirmAssignPermissionToUser')">
                    <i class="fas fa-link"></i> Assign Permission </button>
            </div>
        </div>



        {{-- role tab and details --}}
        <div class=" my-3">
            {{-- tab header  --}}

            @foreach ($rols as $item => $role)
                <a wire:navigate
                    class="text-dark bg-light rounded mb-3 p-3  shadow cursor-pointer rounded d-flex justify-content-between align-items-center"
                    href="{{ route('adminRole.edit', [$role->id]) }}">
                    <div class="left d-flex  align-items-center">
                        <div
                            class="rounded-circle border border-info me-3 w-10 h-10 d-flex justify-content-center align-items-center fs-2">
                            {{ ++$item }}
                        </div>
                        <h5 class="m-0 p-0">
                            {{ Str::upper($role->name) }}
                        </h5>
                    </div>

                    <div class="right">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            @endforeach

            {{-- tab header  --}}
        </div>
        {{-- role tab and details --}}



        {{-- index table --}}
        <div class="overflow-x-scroll scrollbar-none d-none">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <x-th>Rol Id</x-th>
                        <x-th>Role Name</x-th>
                        <x-th>Have Permission</x-th>
                        <x-th>Users</x-th>
                        <x-th>A/C</x-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rols as $id => $rol)
                        <tr>
                            <x-td>{{ $rol->id }}</x-td>
                            <x-td>{{ $rol->name }}</x-td>
                            <x-td>
                                <div class="text text-info">
                                    {{-- {{ implode(', ', $rol->permissions()->pluck('name')->toArray()) }} --}}
                                    @foreach ($rol->permissions as $item)
                                        <span class="bg-success rounded p-1 m-1 d-inline-flex">{{ $item->name }}
                                        </span>
                                    @endforeach
                                </div>
                                {{-- <button type="button" class="my-2 m-md-0 btn btn-outline-success btn-sm" data-toggle="modal" data-target="#assignPermissionModal"> <i class="fas fa-check-circle"></i> Assign Permissions</button> --}}
                            </x-td>
                            <x-td>

                                <button type="button" class="my-2 m-md-0 btn btn-info btn-sm my-1"> <i
                                        class="fas fa-eye"></i>
                                </button>
                            </x-td>
                            <x-td class="d-flex">
                                <a class="my-2 m-md-0 btn btn-outline-primary btn-sm" wire:navigate
                                    href="{{ route('adminRole.edit', [$rol->id]) }}"> <i class="fas fa-edit"></i></a>
                                <button type="button" class="my-2 m-md-0 btn btn-danger btn-sm"
                                    wire:click="deleteRole({{ $rol->id }})"> <i class="fa fa-trash"></i>
                                </button>
                            </x-td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{-- index table --}}

        {{-- @livewire('AssetsComponent') --}}

        {{-- bootstrap modal --}}
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="assignRoleModel">
        Launch demo modal
        </button> --}}



        {{-- add a role to a  modal  --}}
        <x-dialog-modal wire:model.live="confirmAssignRoleToUserModal">
            <x-slot name="title">
                {{ __('Assign A Role to User ') }}
                {{-- {{ $memberGroup }} --}}
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <label for="vendor" class="form-label">Select Vendor :</label>
                    <select wire:model="assign_user" id="vendor" class="form-control form-select">
                        <option value="">-- Select a vendor/user --</option>
                        @foreach ($users as $id => $user)
                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="vendor" class="form-label">Select A Role :</label>
                    <select wire:model="assign_role" id="vendor" class="form-control form-select">
                        <option value="">-- Select a role --</option>
                        @foreach ($rols as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    </select>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmAssignRoleToUserModal')"
                    wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </button>

                <button class="ms-3 btn btn-md btn-success" wire:click="assignRoleToUser" wire:loading.attr="disabled">
                    {{ __('Insert') }}
                </button>
            </x-slot>
        </x-dialog-modal>



        {{-- insert a new role --}}
        <x-dialog-modal wire:model.live="confirmNewRoleModal">
            <x-slot name="title">
                {{ _('Insert A New Role') }}
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <label for="new_role" class="form-label">Name :</label>
                    <input type="text" wire:model="new_role_name" id="new_role" class="form-control"
                        placeholder="Write your role name here">
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmNewRoleModal')"
                    wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </button>

                <button class="ms-3 btn btn-md btn-success" @click="$wire.addNewRole" wire:loading.attr="disabled">
                    {{ __('Insert and Save') }}
                </button>
            </x-slot>
        </x-dialog-modal>



        {{-- assignPermissionToUserModel --}}
        {{-- <div class="modal" id="assignPermissionToUserModel" aria-labelledby="assignPermissionToUserModelLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="assignPermissionToUserModelLabel">Assign Permission </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('Admin.Role.PermsToRoleForm')
                    </div>
                </div>
            </div>
        </div> --}}

        <x-dialog-modal wire:model.live="confirmAssignPermissionToUser">
            <x-slot name="title">
                {{ _('Assign Permissio') }}

            </x-slot>

            <x-slot name='content'>
                {{-- @livewire('Admin.Role.PermsToRoleForm') --}}
            </x-slot>

            <x-slot name="footer">
                <button type="button" class="btn btn-sm btn-default "
                    wire:click="$toggle('confirmAssignmentPermissionToUser')">
                    Close
                </button>

                <button type="button" class="btn btn-sm btn-primary ms-2">
                    Save and Close
                </button>

            </x-slot>
        </x-dialog-modal>

        {{-- add new permission --}}
        {{-- <div class="modal" id="addPermissionModel" aria-labelledby="addPermissionModelLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addPermissionModelLabel"> Add Permission :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('Admin.Role.PermissionForm')
                    </div>
                </div>
            </div>
        </div> --}}

        <x-dialog-modal wire:model.live="confirmNewPermissionModal">
            <x-slot name="title">
                {{ _('Add New Permission') }}
            </x-slot>

            <x-slot name="content">
                <div>
                    @livewire('Admin.Role.PermissionForm')
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-default btn-sm"
                    wire:click="$toggle('confirmNewPermissionModal')">Close</button>
            </x-slot>
        </x-dialog-modal>


        {{-- Quick Edit Role Model --}}
        <div class="modal fade" id="quickEditRoleModel" aria-labelledby="quickEditRoleModelLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="quickEditRoleModelLabel">Assign Permission </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- @livewire("Admin.Role.RQEForm") --}}
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
