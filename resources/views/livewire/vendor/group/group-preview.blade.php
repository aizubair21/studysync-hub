<div >
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Studysync-hub</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dash</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('vendorGroup.index') }}">Groups</a></li>
                            <li class="breadcrumb-item"><a href="#">Show</a></li>
                            <li class="breadcrumb-item active">{{ $group->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        {{-- <button >session test</button> --}}

        <div class="row m-0">
            <div class="col-md-5">

                {{-- group info  --}}

                <div class="pb-3">
                    <div class="text-center">
                        <img src="{{ asset('media/awm.jpg') }}" alt="" class="rounded-full"
                            style="width:70px; height:70px; margin:5px auto">

                        <strong class=" text-success p-1 rounded d-block tw-bold h4"> {{ $group->name }}
                        </strong>
                        <div class=" mb-2 rounded w-auto d-flex justify-content-center align-items-center">
                            <div class="rounded py-1 px-2 bg-primary text-light ">
                                <i class="fas fa-user me-2"></i> Member {{ count($group->students) }}
                            </div>
                            <div class="rounded py-1 px-2 bg-primary text-light mx-2">
                                <i class="fas fa-sync me-2"></i> Request
                            </div>

                            <button style="min-width:120px;" class=" d-md-none rounded bg-success text-light px-2 py-1">
                                <i class="fas fa-user-plus me-1"></i> Add Member
                            </button>


                        </div>
                    </div>
                </div>

                {{-- group attachement --}}
                <div class="card" x-data="{ isShowGA: false, active: null }">
                    <div class="card-header d-flex w-100 justify-content-between align-items-center"
                        x-on:click="isShowGA = !isShowGA">
                        <div>
                            Group attachement
                        </div>
                        <div>
                            <i class="fas fa-caret-down" x-show="isShowGA"></i>
                            <i class="fas fa-caret-right" x-Show="!isShowGA"></i>
                        </div>
                    </div>

                    <div class="card-body overflow-x-scroll " x-show="isShowGA" x-transition>
                        <div class="d-flex justify-content-between align-items-start" style="width:880px">
                            {{-- image attachement --}}
                            <div class="p-1" style="width: 440px">
                                <p>Image</p>
                                <hr>
                                <div class="content"
                                    style="display:grid; grid-template-columns: repeat(auto-fit, 110px); grid-gaps:5px;">
                                    <a href="{{ asset('media/studysync-hub.jpg') }}">
                                        <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                            class="rounded">
                                    </a>
                                    <a href="{{ asset('media/studysync-hub.jpg') }}">
                                        <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                            class="rounded">
                                    </a>
                                    <a href="{{ asset('media/studysync-hub.jpg') }}">
                                        <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                            class="rounded">
                                    </a>
                                    <a href="{{ asset('media/studysync-hub.jpg') }}">
                                        <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                            class="rounded">
                                    </a>
                                    <a href="{{ asset('media/studysync-hub.jpg') }}">
                                        <img src="{{ asset('media/studysync-hub.jpg') }}" alt=""
                                            class="rounded">
                                    </a>
                                </div>
                            </div>

                            {{-- file attachement --}}
                            <div class="p-1" style="width: 440px">
                                <p>File</p>
                                <hr>
                                <div class="content d-flex justify-content-between align-items-center p-1">
                                    <input type="checkbox" name="" id=""
                                        style="height:20px; width:20px">
                                    <div class="shor-text mx-2">
                                        Lorem ipsum dolor sit amet co nsectetur, adipisicing elit. Beatae labore vel
                                        expedita modi officia laborum?
                                    </div>
                                    <div class="d-flex ">
                                        <button class="btn btn-sm btn-success"> <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success ms-1"> <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-outline-default btn-sm"> <i class="fas fa-link"></i> </button>
                    </div>
                </div>

                {{-- group exams --}}
                <div class="card" x-data="{ isShow: false }">
                    <div class="card-header">
                        Group Exams
                    </div>
                    <div class="card-body overflow-x-scroll">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm"> <i class="fas fa-plus me-2"> </i>
                            Create</button>
                    </div>
                </div>
            </div>

            {{-- right side --}}

            {{-- group member --}}
            <div class="col-md-7">
                <div class="card" x-data="{ isShowGM: true, selectedId: [] }" x-init="() => { $wire.on('clearValue', () => { selectedId = [] }) }">
                    <div class="card-header " x-on:click="isShowGM = !isShowGM">
                        <div class=" d-flex justify-content-between align-items-center ">
                            <div>
                                Group Members <span class="p-1 bg-info text-light rounded px-2"
                                    x-html="selectedId.length + ' selected'"> </span>
                            </div>
                            <div>
                                <i class="fas fa-caret-down" x-show="isShowGM"></i>
                                <i class="fas fa-caret-right" x-Show="!isShowGM"></i>
                            </div>
                        </div>


                    </div>
                    <div class="card-body" x-show="isShowGM" x-transition>

                        <div x-show="selectedId.length > 0" x-transition class="w-100">
                            <div class="d-flex w-100 overflow-x-scroll scrolbar-none py-2">

                                <button style="min-width:120px; width:120px; height:35px;"
                                    class="btn btn-sm btn-danger "
                                    x-on:click="$wire.detachMemberFromGroup(selectedId)">
                                    <i class="fas fa-trash me-2"></i> Remove
                                </button>

                                <button style="min-width:120px; width:120px; height:35px;"
                                    class="btn btn-sm btn-danger mx-2" x-on:click="$wire.banUser(selectedId)"> <i
                                        class="fas fa-user-lock mx-2"></i>
                                    Banned
                                </button>

                                <button style="min-width:120px; width:120px; height:35px;"
                                    class="btn btn-sm btn-outline-success" x-on:click="$wire.unBanedUser(selectedId)">
                                    <i class="fas fa-user-check mx-2"></i>
                                    Un Banned
                                </button>

                            </div>
                        </div>

                        <div class="w-100 d-flex justify-content-between align-items-center">

                            <div>
                                Total {{ count($group->students) }} members
                                <div class="input-group py-1">
                                    <input type="checkbox" name="" id="showAll"
                                        style="width:12px; height:12px margin:0 5px">
                                    <label for="showAll" class="m-0 px-2">Show All</label>
                                </div>
                            </div>
                            <div>

                                <input type="search" name="" id="" class="rounded "
                                    placeholder="Enter name to find" style="height:35px">
                            </div>

                        </div>

                        <div class="overflow-x-scroll py-1">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>

                                        </th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>A/C</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group->students as $gps)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <input type="checkbox" x-model="selectedId"
                                                    value="{{ $gps->id }}" id="member_{{ $gps->id }}"
                                                    style="width:20px; height:20px me-2">
                                            </td>
                                            <td style="text-align: start!important">
                                                {{ $gps->name }}
                                                {{-- <span class="p-1 bg-info text-light rounded ms-1">
                                                    {{ $gps['pivot']->is_moderator == 1 ? 'moderator' : '' }} </span> --}}
                                                {{-- <button x-show="{{ $gps['pivot']->is_moderator }} == 1"
                                                    class="d-block btn btn-sm text-danger outline-0 border-0 ">remove
                                                    moderator</button> --}}

                                            </td>
                                            <td>

                                                <div @class([
                                                    'p-1 rounded bg-success text-light',
                                                    'bg-danger' => $gps['pivot']->status != 1,
                                                ])>
                                                    {{-- {{ $loop->iteration }} --}}
                                                    {{ $gps['pivot']->status == 1 ? 'Active' : 'Banned' }}
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm mx-1"> <i
                                                        class="fas fa-user-shield"></i>
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-md" wire:click="$toggle('confirmAddNewMember')"><i
                                class="fas fa-user me-2"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- add member  modals start --}}
    <x-dialog-modal wire:model.live="confirmAddNewMember">
        <x-slot name="title">
            {{ __('Attached member to this group') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">

            <div x-data="{ name: null, selecteMemdId: [] }" x-init="() => { $wire.on('clearValue', () => { selecteMemdId = [] }) }">
                <label for="new_group_name">Select Member form your existance space : </label>

                <div class="row m-0">
                    <div class="col-md-5 bg-info p-3 rounded mb-3">
                        <div style="max-width:300px">

                            <strong class="p-1 h4" x-html="selecteMemdId.length"> </strong> selected member
                            will
                            be added..
                            <button x-show="selecteMemdId.length > 0" x-on:click="selecteMemdId = []"
                                class="d-block btn btn-sm btn-warning my-1">Clear
                                selection</button>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-2 input-group">
                            <input type="search" name="" id="search" class="form-control form-search"
                                placeholder="Type and hit enter">
                            <button type="button" class="input-group-text"> <i class="fas fa-search "></i> find
                            </button>
                        </div>


                        @foreach ($member as $id => $item)
                            <div class="d-flex justify-content-between align-items-center  my-1 py-1 px-2 rounded border border-bottom"
                                style="max-width:360px">

                                <input type="checkbox" x-model="selecteMemdId" value="{{ $item->id }}"
                                    id="spaceMember_{{ $item->id }}"
                                    style="width:20px; height:20px margin-right:10px">

                                <div>
                                    {{ $item->name }}
                                </div>

                                <div>
                                    <i x-show="{{ $item->privilage }} == 1"
                                        class="fas fa-check-circle bg-success rounded-circle"> </i>
                                    <i x-show="{{ $item->privilage }} != 1"
                                        class="fas fa-close bg-danger rounded-circle"> </i>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

                <button class="btn btn-success btn-md mx-2" @click="$wire.attachedMemberToGroup(selecteMemdId)">
                    Submit
                </button>

            </div>


            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        </x-slot>

        <x-slot name="footer">

            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmAddNewMember')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>


        </x-slot>
    </x-dialog-modal>
    {{-- add member  modals end --}}
</div>
