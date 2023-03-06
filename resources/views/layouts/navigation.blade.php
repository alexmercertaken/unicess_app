
<nav x-data="{ open: false }" class="bg-blue-800 border-b border-blue-900 z-20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="text-3xl font-bold tracking-wider text-yellow-400" href="{{ route('lnu') }}">
                       UniCESS
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link class="text-white" :href="route('lnu')" :active="request()->routeIs('lnu')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>

                @auth
                @role('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @endrole
                @endauth

            </div>

            {{--  Authenticated Dropdown  --}}
            <!-- Settings Dropdown -->
            @auth




            <div class="flex">

            @role('admin')
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48" class="">

                    @php
                    $notifs = auth()->user()->unreadNotifications->count();
                    @endphp


                    <x-slot name="trigger">

                        <button class=" mt-2 relative inline-flex items-center   border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                            <h1 class="text-red-500 font-black absolute z-10 right-1 top-0">{{ $notifs }}</h1>
                            <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 96 960 960" width="30"><path d="M160 856v-60h84V490q0-84 49.5-149.5T424 258v-29q0-23 16.5-38t39.5-15q23 0 39.5 15t16.5 38v29q81 17 131 82.5T717 490v306h83v60H160Zm320 120q-32 0-56-23.5T400 896h160q0 33-23.5 56.5T480 976Z"/></svg>
                        </button>

                    </x-slot>

                    <x-slot name="content">

                        @php
                        $notifications = auth()->user()->unreadNotifications;
                        @endphp



                    <div class="flex flex-col drop-shadow-lg backdrop-blur-sm p-1">


                        <h1 class="font-bold px-1 mb-3">Notifications</h1>
                    @forelse (auth()->user()->unreadnotifications as $notification )

                    <hr class="mx-3 m-auto">
                           <h1 class="ml-3 text-sm py-2 px-1 text-green-600"> {{ $notification->data['email'] }} <span class="text-xs text-gray-500 inline-block">new registered account:</span>
                            <span class="text-xs font-thin text-gray-500 inline-block">{{ $notification->created_at->diffForHumans() }}</span>
                        </h1>

                            <a class="text-blue-500 ml-3 text-sm py-2 px-1" href={{ route('markasread', $notification->id) }} class="" data-id="{{ $notification->id }}">
                                Mark as read
                            </a>
                            <hr class="mx-3 m-auto">
                    @empty

                            <h1 class="text-center">No notifications</h1>
                    @endforelse


                </div>

                    </x-slot>
                </x-dropdown>
            </div>
            @endrole








            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2  border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @guest
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endguest
                    </x-slot>

                    <x-slot name="content">





                        @if (Auth::user()->authorize == '1')

                        @hasrole('admin')
                        <x-dropdown-link :href="route('admin.index')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                        @else

                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                        @endhasrole


                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @else


                        <h1 class="text-sm text-red-600 mt-3 mx-5 mb-5 m-auto text-left">You're not authorize yet, The admin is reviewing your account details</h1>
                        @endif







                        @guest
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Register') }}
                        </x-dropdown-link>
                        @endguest




                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
            @endauth



             {{--  Guest Dropdown  --}}
             @guest
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">


                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                            <div>Login</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('Login') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('register')">
                            {{ __('Register') }}
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>
            @endguest


           <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @auth

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth



</nav>
