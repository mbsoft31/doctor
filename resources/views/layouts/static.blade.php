<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
    <div class="min-h-screen max-h-screen flex flex-col bg-gray-100">
        @auth
            @livewire('navigation-menu')
        @else
            @livewire('navigation-menu-guest')
        @endauth

        <div class="flex-1 overflow-y-scroll flex flex-col">
            <div class="flex-1 w-full">
                {{ $slot }}
            </div>
            <div class="border-t shadow bg-white">
                <div class="max-w-7xl mx-auto flex justify-center items-center px-6 py-8">
                    All right reserved &circledR; 2021
                </div>
            </div>
        </div>



    </div>

    @livewireScripts
</body>
</html>
