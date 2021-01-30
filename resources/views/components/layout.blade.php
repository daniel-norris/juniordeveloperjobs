<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Junior Developer Jobs</title>

        <link href="/css/app.css" rel="stylesheet">        

    </head>
    <body class="flex flex-col min-h-screen bg-gray-100">

        <x-header/>
        
        {{ $slot }}

        <x-footer/>
        
    </body>
</html>
