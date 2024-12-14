<div>
    <div class="flex justify-center items-center w-full
    " x-data="{ get: 0, isShowSearch: true, memberGroup: null, isTemp: false, isModerator: false, }">

        <div style="max-width: 650px; width:100%; ">

             {{-- if select a gorup  --}}
            <div class="shadow mb-2">
                <div class="bg-white p-3">
                    
                    @if(!$hasUser)
                        <div class="border-b p-2 bg-slate-200">
                            Attached member
                        </div>
                        <div>

                            {{-- toggle single or multiple instance --}}
                            <div class="p-2 d-flex align-items-center">
                                <input type="radio" x-model="get" value="0" id="get_one"
                                    style="width;25px; height:20px; margin-right:10px; ">
                                <label class="m-0 ms-2" for="get_one">Single Instance</label>
                                <input type="radio" x-model="get" value="1" id="get_two"
                                    style="width;25px; height:20px; margin-left:20px; margin-right:10px ">
                                <label class="m-0 ms-2" for="get_two">Multiple Instance</label>
                            </div>
                            <hr>

                            {{-- single instance --}}
                            <div x-show="get == 0" x-transition>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="memberId">Select A Member :</label>
                                        <select wire:model="memberGroup" id="memberId" class="form-control">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}"> {{ $member->name }} </option>
                                            @endforeach
                                        </select>

                                        {{-- moderator --}}
                                        <div class="mt-2 p-2 d-flex align-items-center">
                                            <input type="checkbox" name="" id="is_moderator" x-model="isModerator"
                                                style="width:20px; hieght:25px; margin-right:10px">
                                            <label class="m-0" for="is_moderator">Made him as moderator</label>
                                        </div>
                                        <div class="p-2 shadow rounded" x-show="isModerator">
                                            {{-- <label for="banned_date">Banned Data :</label> --}}
                                            <input type="date" name="" id="moderator_until" class="form-control"
                                                placeholder="take a banned date">
                                            <div class="form-text">
                                                set a moderator expire date. after those date, user no longer to moderate.
                                            </div>
                                        </div>

                                        {{-- banned  --}}
                                        <div class="mt-2 p-2 d-flex align-items-center">
                                            <input type="checkbox" x-model="isTemp" id="temp_add"
                                                style="width:20px; hieght:25px; margin-right:10px">
                                            <label class="m-0" for="temp_add">Temporary add</label>
                                        </div>
                                        <div class="p-2 shadow rounded" x-show="isTemp">
                                            {{-- <label for="banned_date">Banned Data :</label> --}}
                                            <input type="date" name="" id="banned_date" class="form-control"
                                                placeholder="take a banned date">
                                            <div class="form-text">
                                                as you add for temporary. you are free to set a deleted data. wanna delete
                                                user from group.
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="rounded py-3 border border-primary">
                                            <img src="" class="rounded-circle"
                                                style="width:70px; height:70px; margin: 5px auto;" alt="">

                                            <p>Name</p>
                                            <p>Email </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- multiple instance --}}
                            <div x-show="get == 1" x-transition>
                                <div class="row m-0">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <label>Select Member from bellow </label>
                                            <button class="btn btn-outline-info btn-sm "
                                                x-on:click="isShowSearch = !isShowSearch"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                        {{-- search  --}}
                                        <input x-show="isShowSearch" type="search" placeholder="search group"
                                            wire:model="groupSearchVal" wire:change="groupSearch" id="groupSearch"
                                            class="form-control form-search mb-1">

                                        {{-- member  --}}
                                        @foreach ($members as $member)
                                            <div class="d-flex align-items-center rounded border mb-1 p-2">
                                                <input type="checkbox" wire:model="memberGroup"
                                                    id="member_{{ $member->id }}" value="{{ $member->id }}"
                                                    style="width:20px; height:20px; margin-right:10px">
                                                <div>
                                                    {{ $member->name }}
                                                </div>
                                                <span> <i class="fas fa-caret-right mx-3"></i> </span>
                                                <div>
                                                    {{ $member->email }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="rounded py-3 border border-primary">
                                            <img src="" class="rounded-circle"
                                                style="width:70px; height:70px; margin: 5px auto;" alt="">

                                            <p>Name</p>
                                            <p>Email </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
            
            {{-- select a group first --}}
            <div class="shadow">
                <div class="border-b p-2 bg-slate-200">
                    Select a member group
                </div>

                <div class="bg-white p-3">

                    <select wire:model="memberGroup" id="memberGroup" class="w-full p-2 border border-gray-300 rounded">
                        x-model="memberGroup">
                        <option value="">-- Select a group -- </option>
                        @foreach ($groups as $gp)
                        <option value="{{ $gp->id }}">{{ $gp->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            
            
            <div class="p-2 text-right">
                <button class="px-4 py-2 rounded bg-green-900 text-white" wire:click="save()" type="button" wire:navigate.attr="disabled"
                    wire:click="save">Save </button>
            </div>

        </div>
    </div>
</div>
