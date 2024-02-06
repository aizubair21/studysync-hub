<div class="content-wrapper p-1">
    
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate  href="{{route("administrator-dashboard")}}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate  href="{{route("adminVandor.index")}}">Members Manage</a> </li>
          {{-- <li class="breadcrumb-item"><a wire:navigate  href="{{route("vendorMember.index")}}">Members Roles and Permissions</a> </li> --}}
          <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
    </nav>
        {{-- {{ Auth::user() }} --}}
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex">

                <div class="input-group">
                    <button class="btn btn-sm btn-warning" wire:click="refresh"> <i class="fas fa-sync"></i>  Refresh Data  </button>
                    <div class="input-group-text bg-success text-light">Role</div>
                    <button class="btn btn-success btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal" data-bs-target="#addRoleModel"> <i class="fas fa-plus"></i> New Role </button>
                    <button class="btn btn-info btn-sm my-2 my-md-0 mx-1" data-bs-toggle="modal" data-bs-target="#addPermissionModel"> <i class="fas fa-plus"></i> New Permission </button>
                </div>
            
            </div>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#assignRoleModel" > <i class="fas fa-link"></i> Assign role </button>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#assignPermissionToUserModel" > <i class="fas fa-link"></i> Assign Permission </button>
        </div>
    </div>
    <hr>

    <table class="table table-striped" >
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Have Permission</th>
                <th>Users</th>
                <th>A/C</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rols as $id => $rol)

                <tr>
                    <td>{{$id}}</td>
                    <td>{{ $rol->name }}</td>
                    <td>
                        <div class="text text-info">
                            {{-- {{ implode(', ', $rol->permissions()->pluck('name')->toArray()) }} --}}
                            <ul>
                              @foreach ($rol->permissions as $item)
                                  <li>
                                     <span class="bg-success rounded p-1 m-1">{{$item->name}} </span> -{{$item->guard_name}}
                                  </li>
                              @endforeach
                              <li></li>
                            </ul>
                        </div>
                        {{-- <button type="button" class="my-2 m-md-0 btn btn-outline-success btn-sm" data-toggle="modal" data-target="#assignPermissionModal"> <i class="fas fa-check-circle"></i> Assign Permissions</button> --}}
                    </td>
                    <td>
                    
                    </td>
                    <td>
                    <a  class="my-2 m-md-0 btn btn-outline-primary btn-sm" wire:navigate href="{{route("adminRole.edit", [$rol->id])}}"> <i class="fas fa-eye"></i> Quick Edit</a>
                    <button type="button" class="my-2 m-md-0 btn btn-info btn-sm" > <i class="fas fa-users"></i> Users</button>
                    <button type="button" class="my-2 m-md-0 btn btn-danger btn-sm" wire:click="deleteRole({{$rol->id}})"> <i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- @livewire('AssetsComponent') --}}

    {{-- bootstrap modal --}}
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="assignRoleModel">
    Launch demo modal
  </button> --}}
  
  {{-- role to user --}}
  <div class="modal" id="assignRoleModel" tabindex="-1" aria-labelledby="assignRoleModellLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Assign Role to User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label for="vendor" class="form-label">Select Vendor :</label>
            <select wire:model="assign_user" id="vendor" class="form-control form-select">
                <option value="">-- Select a vendor/user --</option>
                @foreach($users as $user)
                  <option value="{{$user->id}}"> {{$user->name}} </option>
                @endforeach
            </select>
          </div>
          <div class="mb-2">
            <label for="vendor" class="form-label">Select A Role :</label>
            <select wire:model="assign_role" id="vendor" class="form-control form-select">
                <option value="">-- Select a role --</option>
                @foreach($rols as $role)
                  <option value="{{$role->id}}"> {{$role->name}} </option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-md btn-success float-right" wire:click="assignRoleToUser" data-bs-dismiss="modal">Assign</button>
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
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

  {{-- assignPermissionToUserModel --}}
  <div class="modal" id="assignPermissionToUserModel" aria-labelledby="assignPermissionToUserModelLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="assignPermissionToUserModelLabel">Assign Permission </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @livewire("Admin.Role.PermsToRoleForm")
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

      {{-- Quick Edit Role Model --}}
    <div class="modal fade" id="quickEditRoleModel" aria-labelledby="quickEditRoleModelLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="quickEditRoleModelLabel">Assign Permission </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              {{-- @livewire("Admin.Role.RQEForm") --}}
        </div>
      </div>
    </div>

</div>
@include('components.assetsComponents')
