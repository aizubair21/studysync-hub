<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="content-wrapper p-2">
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a wire:navigate  href="route('dashboard')">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Your Groups </li>
              <li class="breadcrumb-item active" aria-current="page"> Update One </li>
            </ol>
            <div class="row my-3 justify-content-between">
                
                <div class="col-md-4">
                    <button class="btn btn-md btn-success"> Update Group Information </button>
                </div>
                            
                <div class="col-md-8 d-inline-flex">
        
                    <!-- Button trigger modal -->
                    <button class="btn btn-md btn-info mx-2 mx-sm-0 rounded-circle  my-2 my-sm-0"> <i class="fas fa-sync"></i> </button>
                    <a wire:navigate href="{{route("vendorGroup.index")}}" class="btn btn-md btn-success rounded-pill mx-2"> <i class="fas fa-tasks"></i> View All Group </a>
                    <button wire:navigate href="{{rotue("vendorGroup.create")}}" class="btn btn-md btn-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Add New </button>
                    <a wire:navigate href="" class="btn btn-md btn-outline-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Add Member </a>
                    <a wire:navigate href="" class="btn btn-md btn-outline-info rounded-pill mx-2"> <i class="fas fa-plus"></i> Exam Schedule </a>
                </div>
            </div>
        </nav>
    

        {{-- group selection panel --}}
        <div class="card">
            <div class="card-body text-center">

                <div class="input-group">
                    <h5 class="card-title input-group-text">Select a Group to Edit</h5>
                    <select class="form-control form-select form-group w-75 mx-auto selectGroup" id="selectGroup">
                        <option value="" selected disabled>Choose...</option>
                        {{-- @foreach ($groups as $group)
                            <option value="{{$group['g_id']}}"> {{$group["name"]}} </option>
                        @endforeach --}}
                    </select>
                    <button class="input-group-text btn-sm btn-success">Check</button>
                </div>

                <div class="form-text">
                    Current Editing gorup already selected. Select another and press check button to edit.
                </div>
            </div>
        </div>

        {{-- udpate form --}}
        <div>
            <div class="card">
                <form>
                    <div class="card-body">

                        <div class="row">
                            {{-- left column --}}
                            <div class="col-lg-4">
                                  {{-- name --}}
                                <div>
                                    <div class="input-group">
                                        <label for="name" class="input-group-text">Group Name : </label>
                                        <input type="text" id="name" wire:model.live="name" class="form-control @error("name") is-invalid @enderror" placeholder="Group Name..">
                                    </div>
                                    <div class="form-text">
                                        Give a unique group name to introduce your group to everyone.
                                    </div>
                                    @error('name')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                {{-- description --}}
                                <div class=" mt-1">
                                    <label for="description" class="form-label">Description : </label>
                                    <textarea wire:model="description" id="description" rows="10" class="form-control" placeholder="Descrive about your group"></textarea>
                                </div>
                            </div>

                            {{-- middle column --}}
                            <div class="col-lg-4">

                            </div>

                            {{-- right column --}}
                            <div class="col-lg-4">

                            </div>
                        </div>
                        {{-- row end --}}
                        <hr>
                        <div class="bordered border-top-1">
                            <button class="btn btn-lg btn-success float-right"> <i class="fas fa-sync"></i> Updat and Save</button>
                        </div>
                    </div>
                    {{-- card body end --}}

                </form>
            </div>
        </div>
    </div>
</div>
