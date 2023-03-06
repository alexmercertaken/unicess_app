<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">  --}}

        <!---Bootstrap---!>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        @livewireStyles
    </head>
    <body class="font-sans antialiased ">


        <div class="flex w-full md:flex-row xl:flex-row md:min-h-screen relative">


            {{--  Sidebar  --}}
            <div class=" bg-red-500 z-30">
            <div class=" w-full min-h-screen bg-gradient-to-t from-blue-600 to-blue-800 sticky top-0">
                <div class="flex flex-col items-center justify-between flex-shrink-0 px-8 py-4 mb-5">
                    <a href="#" class="w-16"><img src="{{ asset('img/logo.png') }}" alt=""></a>

                </div>


                <nav  class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">

                    <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.index') }}>
                        <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M120 216h330v330H120V216Zm60 59v188-188Zm330-59h330v330H510V216Zm83 59v188-188ZM120 606h330v330H120V606Zm60 81v189-189Zm465-81h60v135h135v60H705v135h-60V801H510v-60h135V606Zm-75-330v210h210V276H570Zm-390 0v210h210V276H180Zm0 390v210h210V666H180Z"/></svg>
                        Dashboard
                    </a>

                    <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.faculty.index') }}>
                        <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M733 827q27.917 0 47.458-19.559Q800 787.882 800 759.941T780.458 713Q760.917 694 733 694q-27.5 0-46.75 19.353t-19.25 47Q667 788 686.25 807.5T733 827Zm-.214 133Q766 960 795 944.5t47-42.5q-26-14-53-22.5t-56-8.5q-29 0-56 8.5T624 902q18 27 46.786 42.5 28.785 15.5 62 15.5ZM180 936q-24.75 0-42.375-17.625T120 876V276q0-24.75 17.625-42.375T180 216h600q24.75 0 42.375 17.625T840 276v329q-14-8-29.5-13t-30.5-8V276H180v600h309q4 16 9.023 31.172Q503.045 922.345 510 936H180Zm0-107v47-600 308-4 249Zm100-53h211q4-16 9-31t13-29H280v60Zm0-170h344q14-7 27-11.5t29-8.5v-40H280v60Zm0-170h400v-60H280v60Zm452.5 579q-77.5 0-132.5-55.5T545 828q0-78.435 54.99-133.718Q654.98 639 733 639q77 0 132.5 55.282Q921 749.565 921 828q0 76-55.5 131.5t-133 55.5Z"/></svg>
                        Faculty
                    </a>

                    <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.program.index') }}>
                        <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M110 966q-24.75 0-42.375-17.625T50 906V306q0-24.75 17.625-42.375T110 246h370v60H110v600h600V616h60v290q0 24.75-17.625 42.375T710 966H110Zm104-157V534h60v275h-60Zm166 0V403h60v406h-60Zm166 0V661h60v148h-60Zm184.102-253Q700 556 671 546q-29-10-55-28l-21 20q-9 9-21 9t-21-9q-9-9-9-21t9-21l22-22q-17-26-26-52.5t-9-55.065q0-81.887 56.525-136.161T730 176h190v190q0 76-54.5 133t-135.398 57ZM730 496q54.167 0 92.083-37.917Q860 420.167 860 366V236H730q-52 0-91 36.5t-39 93.3q0 14.2 4 31.2t12 36l115-115q9-9 21-9t21 9.053q9 9.052 9 21.5Q782 352 773 361L659 475q18 9 36 15t35 6Z"/></svg>
                        Program
                    </a>

                    <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.proposal.index') }}>
                        <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M140 936q-24.75 0-42.375-17.625T80 876V216l67 67 66-67 67 67 67-67 66 67 67-67 67 67 66-67 67 67 67-67 66 67 67-67v660q0 24.75-17.625 42.375T820 936H140Zm0-60h310V596H140v280Zm370 0h310V766H510v110Zm0-170h310V596H510v110ZM140 536h680V416H140v120Z"/></svg>
                        Proposal
                    </a>





                    {{--  Manage Account Collapse  --}}
                    <div class="relative w-full px-2  overflow-hidden mt-3">

                        <input  class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer"  type="checkbox">
                        <div class="  h-12 w-full flex items-center">
                            <h1 class="text-md text-slate-200 font-medium">Events/News</h1>
                        </div>
                        <div class="absolute top-3 right-3 text-white transition-transform duration-500 rotate-0 peer-checked:rotate-180">
                            {{--  Arrow Icon  --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>

                        </div>
                          {{--  Content  --}}
                          <div class="bg-gray-700 rounded overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-48">

                            <div class=" flex flex-col">

                                <a class=" flex items-center px-2 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.latest-events.index') }}>
                                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M596.817 836Q556 836 528 807.817q-28-28.183-28-69T528.183 670q28.183-28 69-28T666 670.183q28 28.183 28 69T665.817 808q-28.183 28-69 28ZM180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"/></svg>  Events
                                </a>
                                <a class=" flex items-center px-2 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.latest-news.index') }}>
                                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M596.817 836Q556 836 528 807.817q-28-28.183-28-69T528.183 670q28.183-28 69-28T666 670.183q28 28.183 28 69T665.817 808q-28.183 28-69 28ZM180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"/></svg>  News
                                </a>

                            </div>
                          </div>
                    </div>
                    {{--  End of Manage Account Collapse   --}}

                    {{--  Manage Account Collapse  --}}
                    <div class="relative w-full px-2  overflow-hidden mt-3">

                        <input  class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer"  type="checkbox">
                        <div class="  h-12 w-full flex items-center">
                            <h1 class="text-md text-slate-200 font-medium">Manage Account</h1>
                        </div>
                        <div class="absolute top-3 right-3 text-white transition-transform duration-500 rotate-0 peer-checked:rotate-180">
                            {{--  Arrow Icon  --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>

                        </div>
                          {{--  Content  --}}
                          <div class="bg-gray-700 rounded overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-48">

                            <div class=" flex flex-col">
                                <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.roles.index') }}>
                                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M400 571q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM80 892v-94q0-35 17.5-63t50.5-43q72-32 133.5-46T400 632h23q-6 14-9 27.5t-5 32.5h-9q-58 0-113.5 12.5T172 746q-16 8-24 22.5t-8 29.5v34h269q5 18 12 32.5t17 27.5H80Zm587 44-10-66q-17-5-34.5-14.5T593 834l-55 12-25-42 47-44q-2-9-2-25t2-25l-47-44 25-42 55 12q12-12 29.5-21.5T657 600l10-66h54l10 66q17 5 34.5 14.5T795 636l55-12 25 42-47 44q2 9 2 25t-2 25l47 44-25 42-55-12q-12 12-29.5 21.5T731 870l-10 66h-54Zm27-121q36 0 58-22t22-58q0-36-22-58t-58-22q-36 0-58 22t-22 58q0 36 22 58t58 22ZM400 511q39 0 64.5-25.5T490 421q0-39-25.5-64.5T400 331q-39 0-64.5 25.5T310 421q0 39 25.5 64.5T400 511Zm0-90Zm9 411Z"/></svg>
                                     Roles
                                </a>
                                <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.permissions.index') }}>
                                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M280 644q-28 0-48-20t-20-48q0-28 20-48t48-20q28 0 48 20t20 48q0 28-20 48t-48 20Zm0 172q-100 0-170-70T40 576q0-100 70-170t170-70q72 0 126 34t85 103h356l113 113-167 153-88-64-88 64-75-60h-51q-25 60-78.5 98.5T280 816Zm0-60q58 0 107-38.5t63-98.5h114l54 45 88-63 82 62 85-79-51-51H450q-12-56-60-96.5T280 396q-75 0-127.5 52.5T100 576q0 75 52.5 127.5T280 756Z"/></svg>
                                     Permissions
                                </a>

                                <a class=" flex items-center px-4 py-2 mt-2 text-md font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ route('admin.users.main') }}>
                                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="30"><path d="M684 675q-39.48 0-66.74-27.26Q590 620.48 590 581q0-39.48 27.26-66.74Q644.52 487 684 487q39.48 0 66.74 27.26Q778 541.52 778 581q0 39.48-27.26 66.74Q723.48 675 684 675ZM488 896v-51q0-26 11-44.5t31-28.5q37-19 75-28t79-9q41 0 79 8.5t75 28.5q20 9 31 28t11 45v51H488Zm-88-321q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm0-150ZM80 896v-94q0-34 17-62.5t50.667-43.5Q215 666 276.5 651t123.245-15Q432 636 457 639t54 9l-25.5 25.5L460 699q-13-2-28-2.5t-32-.5q-56.627 0-110.814 11.5Q235 719 172 750q-14 7-23 22t-9 30v34h288v60H80Zm348-60Zm-28-321q39 0 64.5-25.5T490 425q0-39-25.5-64.5T400 335q-39 0-64.5 25.5T310 425q0 39 25.5 64.5T400 515Z"/></svg>
                                    Accounts
                                </a>



                            </div>
                          </div>
                    </div>
                    {{--  End of Manage Account Collapse   --}}


                </nav>
            </div>
        </div>


            {{--  Nav Bar  --}}
            <div class="h-10 w-full fixed top-0 z-10">
                @include('layouts.navigation')


            </div>

            <main class="p-10 flex w-full bg-slate-50 mt-10 flex-col">
                {{ $slot }}


            </main>
    </div>


      {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
      {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  --}}
      {{--  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>  --}}


      @livewireScripts

        @yield('script')
    </body>
</html>
