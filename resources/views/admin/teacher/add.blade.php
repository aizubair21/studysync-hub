@extends('auth.app')
@section('content')
<div class="content-wrapper p-2">    
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="w-100 p-2 d-flex justify-content-between">
                <div>
                    Cereate User
                </div>
                <div>
                    <a href="{{route('adminUser.index')}}" class="btn btn-primary btn-sm ">All User</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('aminUser.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="month" id="" value="{{ date('F') }}">
                    <input type="hidden" name="date" value="{{ date('d') }}">
                    <input type="hidden" name="year" value="{{ date('Y') }}">
                    <div class="row">
                        <div class="col-8">
                            <label for="username" class="from-label">Instute Name or Username :</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid  @enderror"  value="{{ old('username') }}">
                        </div>
                        <div class="col-4">
                            <label for="is_role" class="form-label">Give A Role :</label>
                            <select name="is_role" id="is_role" class="form-control @error('is_role') is-invalid  @enderror">
                                <option value="" disabled selected>Give A Role</option>
                                @foreach ($role as $rol)
                                    <option value="{{ $rol->id }}" >{{ Str::upper($rol->role_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8 my-2">
                            <label for="name" class="from-label">Name :</label>
                            <input type="text" name="name" id="name" class="form-control"  value="{{ old('name') }}">
                        </div>
                        <div class="col-4 my-2">
                            <label for="subs" class="from-label">Subscriptin Pack :</label>
                            <input type="text" name="pack" id="subs" class="form-control"  value="{{ old('pack') }}">
                        </div>
                        <div class="col-12 my-2">
                            <label for="phone" class="from-label">Phone :</label>
                            <input type="text" name="phone" id="phone" class="form-control"  value="{{ old('phone') }}">
                        </div>
                        <div class="col-12 my-2">
                            <label for="email" class="from-label">Email :</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                        <div class="col-12">
                            <label for="password" class="from-label">Password :</label>
                            <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                        <div class="col-12 my-2 w-100" >
                            <button class="btn btn-primary btn-ms float-right" >Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection