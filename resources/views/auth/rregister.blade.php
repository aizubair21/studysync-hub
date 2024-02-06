@extends('layouts.app')

@section('title')
    StudySync-HUB | login to get access
@endsection

@section('content')
<body>
    {{-- @livewire('login', ['user' => $user], key($user->id)) --}}
    @livewire('register')
  </body>
@endsection