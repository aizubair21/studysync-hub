<div>
    <div class="content-wrapper p-4" x-data="{ tabContent: 0 }">
        {{-- {!! $role !!} --}}
        <div class="row justify-content-between">
            <div class="col-md-6 my-2">
                <div class="input-group">
                    <label for="select_role" class="input-group-text">Get new :</label>
                    <select wire:input="selectAnotherRole" wire:model="select_role" id="select-role"
                        class="form-control form-select">
                        @foreach ($roles as $i => $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                    {{-- <button class="btn btn-success btn-md input-group-text" wire:click="selectAnotherRole">Edit</button> --}}
                </div>
            </div>

            <div class=" col-md-6 my-2">
                <button class="btn btn-success btn-sm my-2 my-md-0 mx-1" wire:click="$toggle('confirmNewRoleModel')"> <i
                        class="fas fa-plus"></i> New Role </button>
                <button class="btn btn-info btn-sm my-2 my-md-0 mx-1" wire:click="$toggle('confirmNewPermissionModel')">
                    <i class="fas fa-plus"></i> New Permission </button>
            </div>
        </div>

        <hr>


        {{-- tab content --}}
        <div class="">
            {{-- role user section  --}}
            <a href=""
                class="d-flex justify-content-between align-items-center p-3 my-2 bg-white rounded shadow w-100">
                <div class="left">
                    <h4>
                        User
                    </h4>
                    <p>
                        See those who hold this role, add, edit, delete
                    </p>
                </div>
                <div class="right">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            {{-- role user section  --}}


            {{-- content item table --}}
            <div class="my-3">
                <div class="card ">
                    <div class="card-header shadow">
                        <h2 class=" ">{{ Str::upper($role->name) }}
                        </h2>
                        <p>
                            All <span class="text  p-1 mx-1 ">
                                {{ $role->permissions()->count() }} </span> permission that role have to access.
                        </p>
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Action</x-th>
                                    <x-th>Name</x-th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($role->permissions as $g_i => $item)
                                    <tr>
                                        <x-td>{{ ++$g_i }}</x-td>
                                        <x-td>
                                            <input type="checkbox" class="m-1" wire:model="DP_id"
                                                name="get_perm_{{ $item->id }}" id="get_perm_{{ $item->id }}"
                                                value="{{ $item->id }}">
                                        </x-td>
                                        <x-td>
                                            <label class="m-1"
                                                for="get_perm_{{ $item->id }}">{{ $item->name }}</label>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="card-footer">
                        <button x-show="$wire.DP_id != 0" wire:click="deletePermissionFromRole({{ $role->id }})"
                            class="btn btn-md btn-danger rounded-pill"> <i class="fas fa-trash me-2"></i> Delete
                        </button>

                        <button class="btn btn-outline-info btn-sm rounded-pill ms-3"
                            wire:click="$toggle('confirmAddPermissionToRoleModel')">
                            <i class="fas fa-plus me-2"></i>Add Permission
                        </button>

                    </div>
                </div>
            </div>
            {{-- content item table --}}



            {{-- dnager area  --}}
            <div class="alert alert-warning w-100">
                <x-section-title>
                    <x-slot name="title">
                        <strong class="text text-dagner">Danger Zone</strong>
                    </x-slot>
                    <x-slot name="description">
                        <p>If you delete this role, this process never be undo !</p>
                        <button class="btn btn-outline-danger my-2">Delete Role</button>
                    </x-slot>
                </x-section-title>
            </div>
            {{-- danger area --}}

        </div>
        {{-- tab content --}}

        {{-- add role --}}
        <x-dialog-modal wire:model.live="confirmNewRoleModel">
            <x-slot name="title">
                {{ _('Attach new permission') }}
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <label for="new_role" class="form-label">Write Your Role Name :</label>
                    <input type="text" wire:model="new_role_name" id="new_role" class="form-control"
                        placeholder="new role name">
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-default" wire:click="$toggle('confirmNewRoleModel')">Close</button>
                <button class="btn btn-success btn-sm ms-2" wire:click="addNewRole">Save and Close</button>
            </x-slot>
        </x-dialog-modal>

        {{-- add new permission --}}
        <x-dialog-modal wire:model.live="confirmNewPermissionModel">
            <x-slot name="title">
                {{ _('Attach new permission') }}
            </x-slot>

            <x-slot name="content">
                @livewire('Admin.Role.PermissionForm')
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-default" wire:click="$toggle('confirmNewPermissionModel')">Close</button>
            </x-slot>
        </x-dialog-modal>


        {{-- add permission to role model  --}}
        <x-dialog-modal wire:model.live="confirmAddPermissionToRoleModel">
            <x-slot name="title">
                {{ _('Permissions') }}
            </x-slot>

            <x-slot name="content">

                <x-section-title>
                    <x-slot name="title">
                        {{ $permissions->count() }} Total permission have
                    </x-slot>

                    <x-slot name="description">
                        Attached permission to give access. With in the permission the user might be able to see some
                        special content of your application.
                    </x-slot>
                </x-section-title>
                <div class="card-body overflow-y-scroll " style="height:70vh">
                    @foreach ($permissions as $i => $permisn)
                        <div>
                            <input type="checkbox" wire:model="permission_id" name="assigm_perm_{{ $i }}"
                                id="assigm_perm_{{ $i }}" value="{{ $permisn->id }}">
                            <label for="assigm_perm_{{ $i }}"> {{ $permisn->name }} </label>
                        </div>
                    @endforeach

                </div>
            </x-slot>


            <x-slot name="footer">
                <button class="btn btn-default btn-sm me-2" wire:click="$toggle('confirmAddPermissionToRoleModel')">
                    Close
                </button>

                <button class="btn btn-success btn-sm" wire:click="addPermissionToRole"> save and close </button>
            </x-slot>
        </x-dialog-modal>
        {{-- add permission to role model  --}}
    </div>

    {{-- @include('components.assetsComponents') --}}
