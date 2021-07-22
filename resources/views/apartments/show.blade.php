<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Apartment</title>
</head>
<body>
    <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>
</body>
</html>