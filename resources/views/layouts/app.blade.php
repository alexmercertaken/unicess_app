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



    <body class="font-sans antialiased ">

        @php
            $users = App\Models\User::where('authorize', '1')->get()
        @endphp


        @if (Auth::user()->authorize == '1')


        <div class="flex w-full md:flex-row xl:flex-row md:min-h-screen relative">

              {{--  Sidebar  --}}
            <div class=" bg-red-500 z-20">
                <div class=" w-full min-h-screen bg-gray-800 sticky top-0">
                    <div class="flex flex-col items-center justify-between flex-shrink-0 px-8 py-4 mb-5">
                        <a href="#" class="w-16"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>



                    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                            <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('dashboard') }}>
                                <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M120 216h330v330H120V216Zm60 59v188-188Zm330-59h330v330H510V216Zm83 59v188-188ZM120 606h330v330H120V606Zm60 81v189-189Zm465-81h60v135h135v60H705v135h-60V801H510v-60h135V606Zm-75-330v210h210V276H570Zm-390 0v210h210V276H180Zm0 390v210h210V666H180Z"/></svg>
                                Dashboard
                            </a>

                            <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('proposal') }}>
                                <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M330.18 803.59h300.64v-47.18H330.18v47.18Zm0-169.744h300.307v-47.179H330.18v47.179Zm-74.385 323.487q-31.302 0-53.549-22.246Q180 912.841 180 881.539V270.461q0-31.301 22.246-53.548 22.247-22.246 53.549-22.246h322.513L780 395.359v486.18q0 31.302-22.246 53.548-22.247 22.246-53.549 22.246h-448.41Zm297.59-537.026V245.846h-297.59q-9.231 0-16.923 7.692-7.693 7.693-7.693 16.923v611.078q0 9.231 7.693 16.923 7.692 7.692 16.923 7.692h448.41q9.231 0 16.923-7.692 7.693-7.692 7.693-16.923V420.307H553.385ZM231.179 245.846v174.461-174.461 660.308-660.308Z"/></svg>
                                Proposal
                            </a>


                    </nav>
                </div>
                </div>

               <div class="h-10 w-full fixed top-0 z-10">
                @include('layouts.navigation')


            </div>

            <main class="p-10 flex w-full bg-slate-50 mt-10 flex-col">
                {{ $slot }}


            </main>


        </div>

        @else

        <div class=" w-full min-h-screen flex items-center justify-center">
            <h1 class="text-7xl tex-center">You are not authorize</h1>
        </div>


        @endif
    </body>
</html>
