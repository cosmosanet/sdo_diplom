@extends('layouts.app')

@section('content')

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="submit" value="Login">
</form>

@auth
   <p>asd</p>
   {{auth()->user()->name}}
@endauth

@endsection
