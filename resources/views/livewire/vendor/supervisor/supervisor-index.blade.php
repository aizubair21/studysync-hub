<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="content-wrapper p-2">
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a wire:navigate  href="{{route("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a wire:navigate  href="{{route("vendorMember.index")}}">Member Manage</a> </li>
              {{-- <li class="breadcrumb-item"><a wire:navigate  href="{{route("vendorMember.index")}}">Member Manage</a> </li> --}}
              <li class="breadcrumb-item active" aria-current="page">Supervisor</li>
            </ol>
        </nav>
    
        <div class="row my-3">
            
            <div class="col-md-4">
                <div class="input-group">
                    <label for="supervisor_for" class="input-group-text bg-success text-light">Supervisor for:</label>
                    <select name="" id="" class="form-control form-select" >
                        <option value="0">All</option>
                        <option value="0">Group</option>
                        <option value="0">Member</option>
                    </select>
                </div>
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
                <a wire:navigate href="{{route("vendorMember.create")}}" class="btn btn-md btn-outline-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Add Member </a>
                <a wire:navigate href="{{route("vendorSupervisor.create")}}" class="btn btn-md btn-success rounded-pill mx-2"> <i class="fas fa-plus"></i> Add Supervisor </a>
            </div>
        </div>
        <hr>

        <table class="table table-striped my-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Group</th>
                    <th>Added On</th>
                    <th>A/C</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Lorem</td>
                    <td>lorem@lorem.com</td>
                    <td>01785664820</td>
                    <td>
                        <div class="btn btn-info btn-sm" >Default</div>
                    </td>
                    <td>
                        01-Jan-2021
                    </td>
                    <td class="d-flex">
                        <button class="btn btn-sm rounded btn-danger "> <i class="fas fa-trash">  </i> Delete </button>
                        <a wire:navigate href="{{route("vendorGroup.edit", [1])}}" class="btn btn-sm rounded btn-success my-2 my-sm-0 mx-2"> <i class="fas fa-edit">  </i> Edit</a>
                        <button class="btn btn-sm rounded btn-info" title="Quick view"> <i class="fas fa-eye">  </i> View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
