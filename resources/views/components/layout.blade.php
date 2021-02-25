<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Junior Developer Jobs</title>

        <!-- CSS --> 
        <link href="/css/app.css" rel="stylesheet">        

        <!-- Alpine.js -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        
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
