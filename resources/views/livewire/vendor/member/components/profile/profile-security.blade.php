<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    
    <pre>
        @php
            // print_r($member['role']);
        @endphp
    </pre>
    
    <div class="p-3 border mb-2 rounded">
        <div class="text-md mb-1 font-bold" >User Role</div>
        @if($member['role']) 
            {{-- <select name="" id="" class="p-2 mt-2 w-full border-b focus:border-green-900 focus:outline-0 text-md">
                <option value="">Select A role</option>
                <option value="">Admin</option>
                <option value="">Vendor</option>
                <option value="">Student</option>
            </select> --}}

            <div class="flex justify-between items-center border rounded">
                <div class="px-3">
                    {{ Str::upper($member['role'][0])}}
                </div>

                <button wire:click="removeUserRole()" class="text-red-900 bg-slate-200 px-2 py-1 rounded">
                    Remove
                </button>
            </div>
        @else
        <div class="flex justify-between items-center">

            <div class="text-red-700 font-bold">
                No Role !
            </div>

            <button wire:click="attachedUserRole()" class="px-3 py-1 rounded shadow bg-green-900 text-white">
                Attached Member Role
            </button>
        </div>
        @endif
    </div>

    <div class="p-3 bg-red-200 rounded">
        <div class="text-md mb-1">Reset Password</div>
            <input type="password" class="w-full p-2 rounded border" name="" placeholder="Enter New Password">
        <button class="px-3 py-1 mx-1 text-lg shadow text-white bg-red-600 rounded my-2">Send Password Reset Link</button>
    </div>
</div>
