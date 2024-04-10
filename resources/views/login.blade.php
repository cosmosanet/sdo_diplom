@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('login') }}" method="post">
        @csrf
        {{-- <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ведите ваше имя">
        </div> --}}
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="OAthKey">OAthKey</label>
            <input type="password" name="OAthKey" class="form-control" id="OAthKey"  placeholder="Введите OAthKey">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                 @endforeach
            </div>
        @endif
     
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>

</div>
@endsection
