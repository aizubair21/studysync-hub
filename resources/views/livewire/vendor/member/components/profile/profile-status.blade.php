<div class="my-2">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="font-bold border-b pb-1 w-full">
        Profile Status
    </div>

    @if($profileStatus['privilage'] == 1)
        <div class="flex justify-between items-center rounded py-1">
            <div>
                this profile is active
            </div>
            <select wire:model.lazy="profileStatus.privilage" class="text-md text-green-900" id="">
                <option @if($profileStatus['privilage'] == 1) selected @endif value="1">Active</option>
                <option @if($profileStatus['privilage'] == 0) selected @endif value="0">Block</option>
            </select>
        </div>
    @else
        <div class="font-bold py-2 flex justify-between items-start border-s border-red-900 border-5 px-2 ml-5">
            <div class="w-42 text-red-900">
                <select wire:model.lazy="profileStatus.privilage" class="text-md" id="">
                    <option @if($profileStatus['privilage'] == 1) selected @endif value="1">Active</option>
                    <option @if($profileStatus['privilage'] == 0) selected @endif value="0">Block</option>
                </select>
            </div>
            <p class="text-red-900 text-sm">
                Your profile is blocked. Please contact the admin to unblock your profile.
                <br>
            </p>
        </div>
    @endif
</div>
