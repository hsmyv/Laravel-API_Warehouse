<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/dist/output.css" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

    </head>
    <body class="antialiased">
       {{$slot}}

       <script src="<https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js>"></script>
        <script src="app.js"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="https://unpkg.com/vue@next"></script>
    </body>

</html>
