@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Biblioteka online, <a href="{{ route('login') }}">zaloguj się</a> aby skorzystać z serwisu.</h1> 
            <h1 class="text-center">Jeśli nie masz konta możesz założyć je <a href="{{ route('register') }}">tutaj</a>.</h1>
        </div>
    </div>
</div>
@endsection
