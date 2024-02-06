<div>
    <div class="content-wrapper p-1">
        {{-- {!! $role !!} --}}
        <div class="row justify-content-between">
            <div class="col-md-6 my-2">
                <div class="input-group">
                    <label for="select_role" class="input-group-text" >Current Editing :</label>
                    <select wire:input="selectAnotherRole" wire:model="select_role" id="select-role" class="form-control form-select">
                        <option value="">-- Select another role to edit --</option>
                        @foreach ($roles as $item)
                            <option @if($item->id == 0) selected @endif  value="{{ $item->id }}"> {{$item->name}}   </option>
                        @endforeach
                    </select>
                    {{-- <button class="btn btn-success btn-md input-group-text" wire:click="selectAnotherRole">Edit</button> --}}
                </div>
            </div>

            <div class=" col-md-6 my-2">
                <button class="btn btn-success btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal" data-bs-target="#addRoleModel"> <i class="fas fa-plus"></i> New Role </button>
                    <button class="btn btn-info btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal" data-bs-target="#addPermissionModel"> <i class="fas fa-plus"></i> New Permission </button>
            </div>
        </div>
        <hr>
        
        <ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> <i class="fas fa-eye"></i> Permissions  </button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> <i class="fas fa-plus"></i> Assign New </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active position-relative" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="py-2 text text-info bordered rounded">View all the permission the have the <strong class="bordered rounded bg-success text-light p-2">"{{$role->name}}"</strong> role</div>
                <table class="table " >
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>A/C</td>
                        </tr>
                    </thead>
                    @php
                            $i = 1;
                        @endphp
                        @foreach ($role->permissions as $item)
                        <tbody>
                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    <button wire:click="deletePermissionFromRole({{$role->id}},{{$item->id}})" class="btn-sm btn-danger rounded-circle"> <i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>

            </div>
    
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
                <div >
    
                <label for="permissionName" class="form-label">Select Permission :</label>
                <select wire:model="permission_id" id="permissionName" class="form-control form-multiple" multiple>
                    @foreach ($permissions as $permisn)
                    <option value="{{$permisn->id}}"> {{$permisn->name}} </option>   
                    @endforeach
                </select>
    
                </div>
                <hr>
                <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal" wire:click="addPermissionToRole" > <i class="fas fa-save"></i> save</button>
            
            </div>
            </div>
        </div>
        
        
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
                    <input type="text" wire:model="new_role_name" id="new_role" class="form-control" placeholder="new role name">
                </div>
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal" wire:click="addNewRole">Save</button>
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
            @livewire("Admin.Role.PermissionForm")
            </div>
      </div>
    </div>

    </div>
</div>

@include('components.assetsComponents')
