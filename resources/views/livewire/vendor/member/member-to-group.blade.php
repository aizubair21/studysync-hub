<div>
    <div class="w-full
    " x-data="{ get: 1, isShowSearch: true, memberGroup: null, isTemp: false, isModerator: false, }">

        <div style="" class=" md:flex w-full justify-bettween items-start">

             {{-- if select a gorup  --}}
            <div>
                <div class="bg-white">
                    
                    @if(!$hasUser)
                  
                        <div>

                            {{-- single instance --}}
                            <div x-show="get == 0" x-transition>
                                <div class="">
                                    <div class="">
                                        <label for="memberId">Select A Member :</label>
                                        <select wire:model="memberArray" id="memberId" class="form-control">
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
                                    <div class=" text-center">
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
                            <div class="p-2">
                                <div v-show="get == 1">
                                    <div class="">
                                        <div class="border-b p-3">
                                            Select Member
                                        </div>

                                        {{-- search  --}}
                                        <input x-show="isShowSearch" type="search" placeholder="search member"
                                            wire:model="groupSearchVal" wire:change="groupSearch" id="groupSearch"
                                            class="p-2 mb-2 rounded w-full border-b focus:border-0 focus:shadow-0 focus:outline-0 focus:ring-0">

                                        {{-- member  --}}
                                        @foreach ($members as $member)
                                            <div class="flex items-center rounded border mb-1 p-2">
                                                <input type="checkbox" wire:model="memberArray"
                                                    id="member_{{ $member->id }}" value="{{ $member->id }}"
                                                    style="width:20px; height:20px; margin-right:15px">
                                                <div>
                                                    <div >
                                                        {{ $member->username ?? $member->name }}
                                                    </div>
                                                    
                                                    <div class="text-sm">
                                                        {{ $member->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
            
            <div class="p-2">
                {{-- select a group first --}}
                @if(!$hasGroup)
                    <div class="">
                        <div class="border-b p-3">
                            Select Group
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
                @else
                    <div class="">
                        <div class="p-3">
                            Select Group
                        </div>

                        <div class="bg-white p-3">

                            <select wire:model="memberGroup" id="memberGroup" class="w-full p-2 border border-gray-300 rounded">
                                {{-- <option value="">-- Select a group -- </option> --}}
                                @foreach ($groups as $gp)
                                    <option @if($hasGroup == $gp->id) selected='true' @endif value="{{ $gp->id }}">{{ $gp->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                @endif
            </div>
            
            
        </div>
        <hr>
        <div class="p-2 text-right">
            <button class="px-4 py-2 rounded bg-green-900 text-white" wire:click="save()" type="button" wire:navigate.attr="disabled"
                wire:click="save">Save </button>
        </div>
    </div>
</div>
