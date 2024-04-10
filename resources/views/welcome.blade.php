@extends('layouts.app')

@section('content')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{session()->get('success')}}
</div>
@endif
@if (session()->has('errors'))
<div class="alert alert-warning" role="alert">
  {{ session()->get('errors')}}
</div>
@endif

{{-- <form action="{{ route('fileDowload') }} " method="get">
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
    <input type="submit" value="Logout"> --}}

    <div class="container bg-dark h-100 d-flex justify-content-between p-3">
        <div class="bg-secondary w-100 me-2 border-end ">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название файла</th>
                    <th scope="col">Отправитель</th>
                    <th scope="col">Дата</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)    
                        <tr>
                            <th scope="row">{{ $loop->index+1}}</th>
                            <td>{{$item->file_name}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->create_time}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="bg-primary ms-2 ">
            <h2>Загрузить фаил</h2>
            <form enctype="multipart/form-data" action="{{ route('fileUpload') }}" method="POST">
                @csrf
                <input class="form-control mt-3" type="file" name="file"/>
                <input class="form-control mt-3" type="submit" value="Отправить" />
            </form>
        </div>
    </div>
    <div class="containet position-absolute bottom-0 ">
        <p>footer</p>
    </div>
@endsection
