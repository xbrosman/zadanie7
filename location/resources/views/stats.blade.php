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
        <header>
            <h1>Štatistika</h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/stats">Štatistika</a></li>
            </ul>
        </header>

        @if (isset($countryStats))
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Mesto</th>
                        <th>Počet</th>
                    </tr>

                </thead>
                @foreach ($countryStats as $item)
                    <tr>
                        <td>{{ $item->query }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </table>
        @endif

        @if (isset($queryRes))
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Štát</th>
                        <th>Počet</th>
                    </tr>

                </thead>
                @foreach ($queryRes as $item)
                    <tr>

                        <td><a href="stats/{{ $item->country }}">{{ $item->country }}</a></td>
                        <td><img src="http://www.geonames.org/flags/x/{{ $item->alphacode }}.gif"
                                alt="http://www.geonames.org/flags/x/{{ $item->alphacode }}.gif" width="30"></td>
                        <td>{{ $item->count }}</td>

                    </tr>
                @endforeach
            </table>
        @endif
    </div>

</body>

</html>
