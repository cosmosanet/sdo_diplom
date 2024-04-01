@extends('layouts.app')

@section('content')


<form action="{{ route('fileDowload') }} " method="get">
    @csrf
<input type="submit" value="Dowload">
</form>

<form action="{{ route('fileUpload') }} " method="get">
    @csrf
<input type="submit" value="Upload">
</form>

<form action="{{ route('register') }}" method="post">
    @csrf
    <input type="submit" value="Register">
</form>

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="submit" value="Login">
</form>

<form action="{{ route('logout') }}" method="get">
    @csrf
    <input type="submit" value="Logout">
</form>
@auth
   <p>asd</p>
   {{auth()->user()->name}}
@endauth

@endsection
