<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>Jobs</title>

    </head>
    <body class="antialiased bg-gray-100 h-0 min-h-screen flex flex-col justify-between">
        <div class="flex-grow">
            <x-header/>
            <main>
                {{ $slot }}
            </main>
        </div>

        <x-footer/>
    </body>
</html>
