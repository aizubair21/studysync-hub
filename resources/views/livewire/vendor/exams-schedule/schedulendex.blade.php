<div>
    <div class="content-wrapper p-1">
        
        {{-- breadcrumb --}}
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a wire:navigate  href="{{route("administrator-dashboard")}}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a wire:navigate  href="{{route("vendorMember.index")}}">Exams</a> </li> --}}
                {{-- <li class="breadcrumb-item"><a wire:navigate  href="{{route("vendorMember.index")}}">Member Manage</a> </li> --}}
                <li class="breadcrumb-item active" aria-current="page">Exams </li>
            </ol>
        </nav>
        
        <div class="row mt-1 mb-2">

            <div class="col-10 col-md-3">
                <div class="input-group mb-1">
                    <div class="input-group-text bg-success text-success">
                        Filter
                    </div>
                    <select weir:input="filter" id="" class="form-control form-select">
                        <option value=""> - filter - </option>
                        <option value=""> - filter - </option>
                        <option value=""> - filter - </option>
                        <option value=""> - filter - </option>
                    </select>
                </div>
            </div>

            <div class="col-2 col-md-2 mb-1">
                <a href="" wire:navigate class="btn btn-md btn-outline-success " title="New exam schedule"> <i class="fas fa-plus"></i> New </a>
            </div>
            <div class="col-10 col-md-4">
                <div class="input-group">
                    <input type="search" wire:model="search_exam" id="" class="form-control form-search" placeholder="Search by exan name, subject, group......">
                    <div class="input-group-text bg-success text-light">
                        <i class="fas fa-search "></i>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-3">
                
            </div>

        </div>
        
        <table class="table table-hover table-responsive table-fixed">
            <thead>
                <tr>
                    <th scope="col " style="min-width:20px">A/C</th>
                    <th scope="col " style="min-width:30px; width:30px">#</th>
                    <th scope="col " style="min-width:130px">Name</th>
                    <th scope="col " style="min-width:130px">Group</th>
                    <th scope="col " style="min-width:130px">Subject</th>
                    <th scope="col " style="min-width:120px">Held on</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px" title="Number add for correct answer">R</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px" title="Number cut for gining an wring anster">W</th>
                    <th scope="col " style="min-width:30px; fw-bold; width:30px" title="Number cut for skipping question">S</th>
                    <th scope="col " style="min-width:100px">Status</th>
                    <th scope="col " style="min-width:130px">Create at</th>
                    <th scope="col " style="min-width:130px">Update at</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" id="inp_1" name="inp_1" wire:model="d" value="1">
                    </td>
                    <td>01</td>
                    <td>Regular Exam</td>
                    <td>English Batch 1</td>
                    <td>English</td>
                    <td > <span class="border border-success px-2 py-1 rounded-pill"> 10 Feb, 2024</span></td>
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