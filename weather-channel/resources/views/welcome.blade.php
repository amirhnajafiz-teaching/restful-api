<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My external CSS style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    <style>
        .btn {
            outline: none;
            border: 0 solid black;
            font-size: 1.2rem;
            background: #9ce6ff;
            color: #000000;
            border-radius: 10px;
            padding: 15px 30px;
            margin-top: 10px;
            transition: all 1s;
        }

        .clear {
            background: #000000;
            color: #9ce6ff;
        }

        .btn:hover {
            background: #5a8291;
            color: #ffffff;
        }

        .input-form {
            display: block;
            margin-top: 30px;
            width: 40%;
            padding: 10px 0;
            margin-bottom: 10px;
            outline: none;
            border: 0 solid black;
            background: none;
            font-size: 2rem;
            border-bottom: 2px solid #707179;
            color: #707179;
            transition: all 2s;
        }

        .input-form:focus {
            padding-left: 10px;
            width: 100%;
            background-color: rgba(112, 113, 121, 0.4);
            border-bottom: 2px solid #000000;
            color: #000000;
        }
    </style>

    <title>
        Weather Channel
    </title>
</head>
<body style="background: url('{{ asset('images/bg.svg') }}'); width: 100%; padding-top: 150px; height: 100vh; margin: 0;">
@if(request()->routeIs('home'))
    <div style="margin: 0 auto; width: 45%; padding: 50px; border-radius: 5px; color: #3e3e3e;">
        <h2>
            Hi, Welcome to Weather Channel
        </h2>
        <form action="{{ route('channel') }}" method="get">
            <h2 style="width: 100%; font-size: 2rem; margin-bottom: 10px;">
                <label for="city">
                    Enter the city name
                </label>
            </h2>
            <input class="input-form" placeholder="City ..." type="text" id="city" name="city"/>
            <button type="submit" class="btn">
                Get weather
            </button>
            <button type="reset" class="btn clear">
                Clear
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
