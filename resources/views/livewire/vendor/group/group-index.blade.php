<div>
    <div class="content-wrapper p-2">
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}

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
                    <a href="{{ route('vendorExamSchedule.index') }}" class="nav-link">Group</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link active">All</a>
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
        <div class="mx-2">
            <button class="btn btn-sm rounded btn-danger "> <i class="fas fa-trash"> </i> Delete </button>
        </div>
        {{-- ./header  --}}
        <table class="table table-striped my-3">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>#</th>
                    <th>Name</th>
                    <th>A/C</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>01</td>
                    <td>Science Group</td>
                    <td class="d-flex">
                        <a wire:navigate href="{{ route('vendorGroup.edit', [1]) }}"
                            class="btn btn-sm rounded btn-success my-2 my-sm-0 mx-2"> <i class="fas fa-edit"> </i>
                            Edit</a>
                        <button class="btn btn-sm rounded btn-info" title="Quick view"> <i class="fas fa-eye"> </i>
                            Quick View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
