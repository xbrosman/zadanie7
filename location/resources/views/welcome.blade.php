<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">

    <div class="container mx-auto px-4">
        <h1>Hlavná stránka</h1>

        <form action="/" method="post">
            @csrf
            <div class="">
                <span class="">Zadajte polohu:</span>
                <input name="place" class="" type="text" placeholder="Bratislava" />
            </div>
            <button type="submit">Pošli</button>
        </form>

        @if (isset($location))
            <p>GPS: {{ $location->latitude }}, {{ $location->longitude }}</p>
            <p>Štát: {{ $location->country }}</p>
            <p>Hlavné mesto: </p>
        @endif

        @if (isset($weather))
            <div class="flex flex-wrap">
                <p>Mesto: {{ $weather->city->name, $weather->city->country }}</p>
                @foreach ($weather->list as $day)
                    <div class="">
                        <p>{{ date('H:i D d.m.Y', $day->dt) }}</p>
                        <span>Aktualne: </span><br>
                        <p>{{ $day->weather[0]->main }}</p>
                        <p>{{ $day->weather[0]->description }}</p>
                        <p>{{ $day->clouds->all }}&#x25;</p>
                        <span>Temp:</span><br>
                        <p>{{ $day->main->temp }}&deg;C</p>
                        <p>{{ $day->main->temp_min }}&deg;C</p>
                        <p>{{ $day->main->temp_max }}&deg;C</p>
                        <p>{{ $day->main->humidity }}&#x25;</p>
                        <span>Wind:</span><br>
                        <p>{{ $day->wind->speed }}m/s</p>
                        <p>{{ $day->wind->deg }}&deg;</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
