<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="card">
        <div class="card-header">
                Create Form
        </div>
    
        <div class="card-body">
            <form wire:submit="storeVendor">
                @csrf

                <div class="row">
                    <div class="col-8">
                        <label for="username" class="from-label">Vendor name :</label>
                        <input type="text" wire:model.live="username" id="username" class="form-control @error('username') is-invalid  @enderror"  value="{{ old('username') }}">
                        <div class="form-text">
                            @error('username')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="is_role" class="form-label">Give A Role :</label>
                        <select wire:model.live="is_role" id="is_role" class="form-control @error('is_role') is-invalid  @enderror">
                            {{-- <option value="" disabled>Give A Role</option> --}}
                            <option value="2">Student</option>
                            <option value="5" selected>Vendor</option>
                            <option value="1">Parent</option>
                        </select>
                        @error('is_role')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="col-8 my-2">
                        <label for="name" class="from-label">Personal Name :</label>
                        <input type="text" wire:model.live="name" id="name" class="form-control"  value="{{ old('name') }}">
                        @error('name')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="col-4 my-2">
                        <label for="subs" class="from-label">Subscriptin Pack :</label>
                        <input type="text" wire:model.live="pack"  id="subs" class="form-control @error('pack') is-invalid @enderror"  value="{{ old('pack') }}">
                        @error('pack')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="col-12 my-2">
                        <label for="phone" class="from-label">Phone :</label>
                        <input type="text" wire:model.live="phone" id="phone" class="form-control"  value="{{ old('phone') }}">
                        @error('phone')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="col-12 my-2">
                        <label for="email" class="from-label">Email :</label>
                        <input type="email" wire:model.live="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="col-12">
                        <label for="password" class="from-label">Password :</label>
                        <input type="text" wire:model.live="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                    </div>

                    <div class="col-12 my-2 w-100" >
                        <button class="btn btn-primary btn-lg float-right" >Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
