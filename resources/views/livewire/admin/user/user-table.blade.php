<div>
    {{-- The Master doesn't talk, he acts. --}}
    <table class="table table-hober table-bordered table-responsive">
        <thead>
            <tr>
                <th> </th>
                <th>#</th>
                <th>Id</th>
                <th>Name </th>
                <th>Email </th>
                <th>Phone </th>
                <th>Subscrive</th>
                <th>Status</th>
                <th>Role</th>
                <th>A/C</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($vendorData as $std)
                <tr>
                    <td>
                        <input type="checkbox" name="user_1" id="user_1">
                    </td>
                    <td>{{ $i++ }}</td>
                    <td>{{ $std->id }}</td>
                    <td> {{ $std->name }}</td>
                    <td> {{ $std->email }}</td>
                    <td> {{ $std->phone }}</td>
                    <td>
                        50
                    </td>
                    <td>
                        <span class="py-2 px-4 bg-success rounded texst-light">OK</span>
                    </td>
                    <td>
                        <span class="px-4 py-2 border rounded">vendor</span>
                    </td>
                    <td class="d-flex">
                        <div>
                            {{-- <form action="{{ route('adminUser.delete',['id' => $std->id]) }}" method="delete">
                                @csrf
                                @method('delete')
                            </form> --}}
                            <button wire:confirm="Are you sure you want to delete this post?"
                                wire:click="dropVendor({{ $std->id }})" class="btn btn-danger btn-sm rounded ">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                        <div>
                            <button wire:click="editVendor({{ $std->id }})"
                                class="btn btn-info btn-sm rounded mx-2">
                                <i class="fas fa-edit"> </i> Edit
                            </button>
                        </div>
                        <div>
                            <button wire:click="queryVendor({{ $std->id }})" class="btn btn-info btn-sm rounded">
                                <i class="fas fa-eye"> </i> View
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($is_update_form_show)
        <div class="container">
            <div
                style="z-index:9999; position: absolute; top:50%;left:50%; transform:translate(-50%, -50%); width:100%; height:100vh; background-color:rgba(0,0,0,.3); display:flex; justify-content:center; align-items:center">

                <div class="card" style="max-width:570px">
                    <div class="card-header">
                        Update Vendor Info
                    </div>
                    <hr>
                    <div class="card-body">
                        <form wire:submit="updateVendor">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <label for="username" class="from-label">Instute Name or Username :</label>
                                    <input type="text" wire:model="username" id="username"
                                        class="form-control @error('username') is-invalid  @enderror">
                                </div>

                                <div class="col-4 my-2">
                                    <label for="name" class="from-label">Name :</label>
                                    <input type="text" wire:model="name" id="name" class="form-control">
                                </div>
                                <div class="col-4 my-2">
                                    <label for="role" class="from-label ">Role :</label>
                                    <select name="role" id="role" class="form-contorl form-select">

                                        <option value="2">Student</option>
                                        <option value="5" selected>Vendor</option>
                                        <option value="1">Parent</option>
                                    </select>
                                </div>
                                <div class="col-4 my-2">
                                    <label for="pack" class="from-label">Subscription Pack :</label>
                                    <input type="text" wire:model="pack" id="pack" class="form-control">
                                </div>
                                <div class="col-12 my-2">
                                    <label for="phone" class="from-label">Phone :</label>
                                    <input type="text" wire:model="phone" id="phone" class="form-control">
                                </div>
                                <div class="col-12 my-2">
                                    <label for="email" class="from-label">Email :</label>
                                    <input type="email" wire:model="email" disabled id="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                </div>
                                {{-- <div class="col-12">
                                <label for="password" class="from-label">Password :</label>
                                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            </div> --}}
                                <div class="col-12 my-2 w-100">
                                    <button class="btn btn-primary btn-ms float-right">Update and Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button wire:click="hide_update_form" class="btn btn-warning btn-sm float-right"> close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
