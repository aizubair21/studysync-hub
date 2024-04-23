<div>
    <div class="content-wrapper p-2">

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
                    <a wire:navigate href="{{ route('adminVandor.index') }}" class="nav-link ">Vendor</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link ">Create</a>
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
                            <input type="text" wire:model.live="username" id="username"
                                class="form-control @error('username') is-invalid  @enderror"
                                value="{{ old('username') }}">
                            <div class="form-text">
                                @error('username')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="is_role" class="form-label">Give A Role :</label>
                            <select wire:model.live="is_role" id="is_role"
                                class="form-control @error('is_role') is-invalid  @enderror">
                                <option value="" disabled>Give A Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ Str::upper($role->name) }}</option>
                                @endforeach
                            </select>
                            @error('is_role')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>


                        <div class="col-8 my-2">
                            <label for="name" class="from-label">Personal Name :</label>
                            <input type="text" wire:model.live="name" id="name" class="form-control"
                                value="{{ old('name') }}">
                            @error('name')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="subs" class="from-label">Subscriptin Pack :</label>
                            <input type="text" wire:model.live="pack" id="subs"
                                class="form-control @error('pack') is-invalid @enderror" value="{{ old('pack') }}">
                            @error('pack')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="phone" class="from-label">Phone :</label>
                            <input type="text" wire:model.live="phone" id="phone" class="form-control"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="email" class="from-label">Email :</label>
                            <input type="email" wire:model.live="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password" class="from-label">Password :</label>
                            <input type="text" wire:model.live="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <strong class="text text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="col-12 my-2 w-100">
                            <button class="btn btn-primary btn-lg float-right">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
