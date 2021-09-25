<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My external CSS style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    <style>
        .btn {
            background: #cbd5e0;
            color: #1a202c;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .btn:hover {
            background: #707179;
            color: #1a202c;
        }
    </style>

    <title>
        Weather Channel
    </title>
</head>
<body>
@if(request()->routeIs('home'))
    <div style="margin: 60px auto; width: 60%; padding: 50px; background-color: #1a202c; border-radius: 5px; color: #cbd5e0;">
        <h2>
            Hi, Welcome to Weather Channel
        </h2>
        <form action="{{ route('channel') }}" method="get">
            <label for="city" style="width: 100%; font-size: 1.5rem; margin-bottom: 10px;">
                Enter the city name
            </label>
            <input type="text" id="city" name="city" style="width: 100%; padding: 10px; border-radius: 5px; margin-bottom: 10px;"/>
            <button type="submit" class="btn">
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
