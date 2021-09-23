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
    @if(request()->routeIs('home'))
        <div>
            <h2>
                Hi, Welcome to Weather Channel
            </h2>
            <form action="{{ route('channel.index') }}" method="get">
                <label for="city">
                    Enter the city name
                </label>
                <input type="text" id="city" name="city"/>
                <button type="submit">
                    Get weather
                </button>
            </form>
        </div>
    @else
        <div>
            @yield('content')
        </div>
    @endif
</body>
</html>
