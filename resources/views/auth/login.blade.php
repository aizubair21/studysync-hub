@extends('layouts.app')

@section('title')
    StudySync-HUB | login to get access
@endsection

@section('content')

    <div class="bg-gray-300 h-screen w-full flex justify-center items-center ">
        <div class="bg-white rounded-lg shadow-lg p-5" style="width: 100%; max-width:350px">
            <div class="font-bold text-2xl p-3 text-center">Login</div>
            <hr>
            <form action="{{route('login')}}" method="post">
                @csrf

                <div class="px-3 py-2 text-md mb-3">
                    <input type="email" name="email" placeholder="Your Email" class="w-full border p-2 focus:border  font-md rounded " id="">
                </div>
                
                <div class="px-3 py-2 text-md mb-3">
                    <input type="password" name="password" placeholder="Your Password" class="w-full border rounded  p-2 focus:border font-md" id="">
                </div>
                
                <div class="p-3 text-right">
                    <button type="submit" class="w-24 mx-auto px-4 py-2 rounded-lg bg-green-900 text-white">login</button>
                </div>
            </form>
        </div>
        

    </div>
@endsection
