<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div style="margin: 20rem 5rem 0 0; text-align: center;">
        <h1>عنوان الفيديو: {{ $video->name }}</h1>
        <h3>عدد مشاهدات الفيديو: {{$video->views}}</h3>
        {!! $video->embed_link !!}
    </div>

</body>

</html>
