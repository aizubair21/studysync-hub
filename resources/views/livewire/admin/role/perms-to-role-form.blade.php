<div>

    {{-- assignPermissionToUserModel --}}
    <ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">To User</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">To Role</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            {{-- permission to user --}}
            <div class="">

                <label for="" class=" "> Select User :</label>
                <select wire:click="user_id" id="" class="form-control form-select">
                    <option value="">-- Select user --</option>
                </select>
                <br>
                <label for="permissionsToUser" class="form-label">Select Permission :</label>
                <select wire:model="permission_id" id="permissionsToUser" class="form-control">
                    <option value="0">-- Select single permission --</option>
                </select>

            </div>
            <hr>
            <button type="button" wire:click="assignPermissionToUser" class="btn btn-md btn-success float-right"
                data-bs-dismiss="modal">Save</button>

        </div>

        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            {{-- permission to a role --}}
            <div>
                <form name="permissionToRoleForm" id="permissionToRoleForm"></form>
                <label for="RoleName">Select Role :</label>
                <select wire:model="role_id" id="RoleName" class="form-control form-select">
                    <option value="">-- Select a role --</option>
                    @foreach ($rols as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
                <br>
                <label for="permissionName" class="form-label">Select Permission :</label>
                <select wire:model="permission_id" id="permissionName" class="form-control">
                    <option value="0">-- Select single permission --</option>
                    @foreach ($permission as $permisn)
                        <option value="{{ $permisn->id }}"> {{ $permisn->name }} </option>
                    @endforeach
                </select>

            </div>
            <hr>
            <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal"
                wire:click="assingPermissionToRole">Save</button>

        </div>
    </div>
</div>


</div>

{{-- @include('components.assetsComponents') --}}
