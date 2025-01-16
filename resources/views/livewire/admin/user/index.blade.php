<div>
    <div class="content-wrapper p-2" x-data="{
        search: 'search data',
        select: '',
    }">
        {{-- send this alpine data to 'admin.user.usertale' livewire components --}}
        {{-- @include('sweetalert::alert') --}}

        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        {{-- </form> --}}
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
                    <a href="#" class="nav-link active">Vendors</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-sm btn-info"> <i class="fas fa-plus me-2"> </i> Add </button>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item me-2">
                    <button class="btn btn-info  mb-2"> <i class="fas fa-filter ms-1"></i> Filter</button>
                </li>
                <li class="nav-item me-2">
                    <input type="search" class="form-control rounded" x-model="search"
                        wire:change="$dispatch('searchToChild', {'search' : search})" id="">
                </li>
            </ul>
        </nav>
        {{-- ./header  --}}
        {{-- <div x-html="search"></div> --}}

        {{-- <div class="row my-3">

            <div class="col-md-4">
                <button class="btn btn-md btn-success"> Vendor </button>
            </div>
            <div class="col-md-4 ">
                <div class="input-group">
                    <input type="text" placeholder="Search..." class="form-control  border-0 shadow-sm"
                        wire:model='search'>
                    <button class="input-group-text">check</button>
                </div>
            </div>

            <div class="col-md-4 d-inline-flex">

                <!-- Button trigger modal -->
                <button class="btn btn-md btn-info mx-2 mx-sm-0 rounded-circle  my-2 my-sm-0"> <i
                        class="fas fa-sync"></i>
                </button>
                <a wire:navigate href="{{ route('adminVandor.create') }}"
                    class="btn btn-md btn-outline-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Add Vendor </a>
            </div>
        </div> --}}
        <div class="d-flex border-bottom overflow-x-scroll scrolbar-none" x-data="{ name: 'zubair' }">
            <div class="d-flex m-2">
                <div class="input-group-text bg-light outline-0 border-0">
                    Action :
                </div>
                <select class="form-select form-control" x-model="select" id="action_select">
                    <option selected value="Select Action">Select Action </option>
                    <option value="0">Delete</option>
                    <option value="1">Draft</option>
                </select>
                <button class="btn btn-sm btn-success ms-1" wire:click="$dispatch('testToChild', {message: search})">
                    {{-- this wire click method work here, this method are basically  used to send data from parent component to child component.
                    and this is a alpine event.   --}}
                    Applay
                </button>


            </div>

            <div class="d-flex m-2">
                <div class="input-group-text bg-light outline-0 border-0">
                    Get by :
                </div>
                <select class="form-select border-0 outline-0 " name="action" id="action_select">
                    <option value="0">All </option>
                    <option value="0">Drafted</option>
                    <option value="1">Warn</option>
                </select>
            </div>


            {{-- <div class="input-group m-2">
                <div class="input-group-text">
                    Filter
                </div>
                <select name="filter" id="filter" class="form-control form-select">
                    <option value="All">All</option>
                    <option value="All">Draft</option>
                    <option value="All">Warrent</option>
                </select>
            </div> --}}
        </div>
        @livewire('admin.user.user-table')
        {{-- @livewire('admin.user.usertable', ['search' => $search]) --}}
        {{-- <livewire:admin.user.usertable /> --}}
    </div>
</div>
