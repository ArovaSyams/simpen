<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            .checkedBill {
                fill: black;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

    {{-- <script type="">
        const modal = document.getElementById('modal1');
console.log(modal);
    </script> --}}
    <script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dashboardmodal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/monthly-modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/check.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/added-monthly-modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/edit-monthly-modal.js') }}"></script>
</html>
