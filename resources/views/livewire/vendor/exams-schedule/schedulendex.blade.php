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
                    <a href="{{ route('vendorExamSchedule.index') }}" class="nav-link">Exam Schedule</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link active">Create</a>
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


        @if (count($action) > 0)
            <div class=" d-flex bg_light overflow-scroll scrolbar-none">
                <button class="btn btn-outline-danger m-2"> <i class="fas fa-trash ms-1"></i></button>
                <button class="btn btn-outline-info m-2"> <i class="fas fa-edit ms-1"></i> </button>
                <div class=" btn m-2 mx-3 border "> <i class="fas fa-sync"></i> </div>
                <a href="" class="btn btn-outline-info m-2"> <i class="fas fa-plus ms-1"></i> Add Question </a>
                <a href="" class="btn btn-outline-info m-2"> <i class="fas fa-list ms-1"></i> View Question </a>
                <a href="" class="btn btn-info m-2"> <i class="fas fa-play ms-1"></i> Go Live </a>

                {{-- <select name="order_by" id="order_br" class="form-control form-select m-2">
                <option value="all">All</option>
                <option value="asc">Ascending Order</option>
                <option value="desc">Descending Order</option>
            </select>
            <select name="group_by" id="group_by" class="form-control form-select m-2">
                <option value="all">All</option>
                <option value="today">Today</option>
                <option value="tomorrow">Tomorrow</option>
                <option value="weekly">This Week</option>
                <option value="monthly">This Month</option>
            </select> --}}
            </div>
        @endif
        <table class="table table-hover table-responsive table-fixed">
            <thead>
                <tr>
                    <th scope="col " style="min-width:20px">A/C</th>
                    <th scope="col " style="min-width:30px; width:30px">#</th>
                    <th scope="col " style="min-width:130px">Name</th>
                    <th scope="col " style="min-width:130px">Group</th>
                    <th scope="col " style="min-width:130px">Subject</th>
                    <th scope="col " style="min-width:120px">Held on</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px"
                        title="Number add for correct answer">R</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px"
                        title="Number cut for gining an wring anster">W</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px"
                        title="Number cut for skipping question">S</th>
                    <th scope="col " style="min-width:100px">Status</th>
                    <th scope="col " style="min-width:130px">Create at</th>
                    <th scope="col " style="min-width:130px">Update at</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" id="inp_1" name="inp_1" wire:model="action" value="1">
                    </td>
                    <td>01</td>
                    <td for="inp_1">Regular Exam</td>
                    <td>English Batch 1</td>
                    <td>English</td>
                    <td> <span class="border border-success px-2 py-1 rounded-pill"> 10 Feb, 2024</span></td>
                    <td class="text text-success">1</td>
                    <td class="text text-danger">.25</td>
                    <td class="text text-danger">.10</td>
                    <th>
                        <span class="rounded-pill bg-warning text-dark py-1 px-2">Draft</span>
                    </th>
                    <td>08 Feb, 2024 10:00 AM</td>
                    <td>08 Feb, 2024 10:00 AM</td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="inp_2" name="inp_2" wire:model="action" value="2">
                    </td>
                    <td>01</td>
                    <td>Regular Exam</td>
                    <td>English Batch 1</td>
                    <td>English</td>
                    <td> <span class="border border-success px-2 py-1 rounded-pill"> 10 Feb, 2024</span></td>
                    <td class="text text-success">1</td>
                    <td class="text text-danger">.25</td>
                    <td class="text text-danger">.10</td>
                    <th>
                        <span class="rounded-pill bg-warning text-dark py-1 px-2">Draft</span>
                    </th>
                    <td>08 Feb, 2024 10:00 AM</td>
                    <td>08 Feb, 2024 10:00 AM</td>
                </tr>
            </tbody>
        </table>
        {{-- <button wire:click="check">Check</button> --}}
    </div>
</div>

@include('components.assetsComponents')
