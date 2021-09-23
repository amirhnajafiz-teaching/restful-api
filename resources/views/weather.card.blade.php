@extends('welcome')

@section('content')
    <div class="card">
        <h2>
            {{ $response['name'] }}
        </h2>
        <h3>
            {{ $response['weather']['main'] }}
            <span>Wind {{ $response['wind']['speed'] }}</span>
        </h3>
        <h1>{{ $response['main']['temp'] }}°</h1>
        <div class="sky">
            <div class="sun"></div>
            <div class="cloud">
                <div class="circle-small"></div>
                <div class="circle-tall"></div>
                <div class="circle-medium"></div>
            </div>
        </div>
    </div>
@stop
