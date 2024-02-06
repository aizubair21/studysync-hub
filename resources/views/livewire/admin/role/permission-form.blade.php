<div>
    <div class="mb-2">
        <label for="new_role" class="form-label">Write Your Permissions Name :</label>
        <input type="text" wire:model="new_permission_name" id="new_role" class="form-control @error("new_permission_name") is-invalid @enderror" placeholder="permission name">
        @error("new_permission_name")
            <strong class="text text-danger py-1">{{ $message }}</strong>
        @enderror
        <div class="form-text text text-info">

          Be careful your think. New permission isn't work unless you assign it to either user or a role.
          <p>
            If you have a set of permission. You must define and separate them with a comma.
          </p>
          <p>
            If your permission name have more then  one word, use underscore (_) instead space. For example "write_post".
          </p>
        </div>
      </div>
      <button type="button" class="btn btn-md btn-success float-right" data-bs-dismiss="modal" wire:click="addPermission">Save</button>
  
</div>
@include('components.assetsComponents')