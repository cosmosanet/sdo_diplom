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
@endsection
