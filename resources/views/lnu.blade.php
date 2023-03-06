<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="//unpkg.com/alpinejs" defer></script>
        @vite('resources/css/app.css')
    </head>



    <body class="font-sans antialiased">

    {{--  Nav Section  --}}

    @include('layouts.navigation')


    {{--  Hero Section  --}}
    @include('lnu-partials.lnu-hero-section')

    {{--  About Section  --}}
    @include('lnu-partials.lnu-about-section')

    {{--  Lastest Section  --}}
    @include('lnu-partials.lnu-latest-section')

    {{--  University Updates  --}}
   @include('lnu-partials.lnu-updates')

   @hasrole('admin')
    {{--  LNU Buttons  --}}
    @include('lnu-partials.lnu-buttons')
    @endrole


    <x-messages/>






</body>
</html
