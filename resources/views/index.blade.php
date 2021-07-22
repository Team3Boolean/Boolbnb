<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
</head>
<body>
    <h1>Ciao dalla home</h1>

    @foreach($apartments as $apartment)
        <div>
            <h2>{{ $apartment->id }}</h2>
            <h3>{{ $apartment->title }}</h3>
            <p>{{ $apartment->description }}</p>
            <a href="{{ route('apartments.show', $apartment->id) }}">Vai ai dettagli...</a>
        </div>
    @endforeach

</body>
</html>