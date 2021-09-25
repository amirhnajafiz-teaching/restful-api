@extends('welcome')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>
                {{ $location['name'] }}
            </h2>
            <img src="https://www.countryflags.io/{{ $location['country'] }}/flat/64.png"
                 alt="{{ $location['country'] }}"/>
        </div>
        <h3>{{ $weather['current']['weather'][0]['main'] }}<span>Wind {{ $weather['current']['wind_speed'] }}km/h</span>
        </h3>
        <h1>{{ round($weather['current']['temp']) }}°</h1>
        <div class="sky">
            <img src="https://openweathermap.org/img/wn/{{ $weather['current']['weather'][0]['icon'] }}@2x.png"
                 alt="{{ $weather['current']['weather'][0]['description'] }}">
        </div>
        <table>
            <tr>
                @foreach(range(0, count($weather['daily']) - 1) as $i)
                    <td style="vertical-align: baseline;">{{ now()->addDays($i)->format('D') }}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($weather['daily'] as $day)
                    <td>{{ round($day['temp']['max']) }}°</td>
                @endforeach
            </tr>
            <tr>
                @foreach($weather['daily'] as $day)
                    <td>{{ round($day['temp']['min']) }}°</td>
                @endforeach
            </tr>
        </table>
        <a href="{{ route('home') }}" style="display:block; text-align: center; padding: 10px; border-radius: 5px; width: 20%; margin: 30px auto; color: white; background-color: #1a202c;">
            Back
        </a>
    </div>
@stop
