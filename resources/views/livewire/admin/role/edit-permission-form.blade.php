<div>
    <div class="content-wrapper p-1">
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
                <button class="btn btn-success btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal"
                    data-bs-target="#addRoleModel"> <i class="fas fa-plus"></i> New Role </button>
                <button class="btn btn-info btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal"
                    data-bs-target="#addPermissionModel"> <i class="fas fa-plus"></i> New Permission </button>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header alert alert-warning">
                        <h2 class=" ">You are editing <span
                                class="px-2 py-1 rounded bg-success text-light fs-uppercase">{{ $role->name }}</span>
                            Role</h2>
                        <p>
                            All <span class="text text-info border border-info p-1 mx-1 ">
                                {{ $role->permissions()->count() }} </span> permission that role have to access.
                        </p>
                    </div>
                    <div class="card-body">
                        @foreach ($role->permissions as $g_i => $item)
                            <div class="d-inline-flex align-items-center m-1">
                                <input type="checkbox" class="m-1" wire:model="DP_id"
                                    name="get_perm_{{ $item->id }}" id="get_perm_{{ $item->id }}"
                                    value="{{ $item->id }}">
                                <label class="m-1" for="get_perm_{{ $item->id }}">{{ $item->name }}</label> ||
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button wire:click="deletePermissionFromRole({{ $role->id }})"
                            class="btn btn-md btn-danger rounded-pill"> <i class="fas fa-trash"></i> Delete</button>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Attach Permission :

                            Assign new permission from <span
                                class="text text-info border border-info p-1 mx-1">{{ $permissions->count() }} </span>
                            all permissions. </p>
                            </h4>

                    </div>
                    <div class="card-body">
                        @foreach ($permissions as $i => $permisn)
                            <div>
                                <input type="checkbox" wire:model="permission_id"
                                    name="assigm_perm_{{ $i }}" id="assigm_perm_{{ $i }}"
                                    value="{{ $permisn->id }}">
                                <label for="assigm_perm_{{ $i }}"> {{ $permisn->name }} </label>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-footer">

                        <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal"
                            wire:click="addPermissionToRole"> <i class="fas fa-save"></i> save</button>
                    </div>
                </div>

            </div>


        </div>
        <hr>


        {{-- add role --}}
        <div class="modal" id="addRoleModel" aria-labelledby="addRoleModelLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addRoleModelLabel">Add New Role </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="new_role" class="form-label">Write Your Role Name :</label>
                            <input type="text" wire:model="new_role_name" id="new_role" class="form-control"
                                placeholder="new role name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal"
                            wire:click="addNewRole">Save</button>
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
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
                        @livewire('Admin.Role.PermissionForm')
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('components.assetsComponents')
