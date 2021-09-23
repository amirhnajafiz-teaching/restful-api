<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>

    <form action="{{ route('channel.index') }}" method="post">
        @csrf
        <label for="city">
            Enter the city name
        </label>
        <input type="text" id="city" />
        <button type="submit">
            Get weather
        </button>
    </form>

</body>
</html>
