<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My external CSS style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    <title>
        Weather Channel
    </title>
</head>
<body>
<div>
    <h2>
        Hi, Welcome to Weather Channel
    </h2>
    <form action="{{ route('channel.index') }}" method="post">
        @csrf
        <label for="city">
            Enter the city name
        </label>
        <input type="text" id="city" name="city"/>
        <button type="submit">
            Get weather
        </button>
    </form>
</div>
<div>
    @yield('content')
</div>
</body>
</html>
