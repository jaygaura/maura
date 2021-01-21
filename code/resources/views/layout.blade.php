<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        @yield('fonts')
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header x-data="{ open: false }" class="fixed w-full bg-white z-50 shadow sm:static">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between py-2">
                        <div class="flex">
                            <!-- Navigation Links -->
                            <div class="hidden sm:flex sm:space-x-8 sm:-my-px sm:ml-10">
                                <x-nav-link href="{{ route('q1.page') }}" :active="request()->routeIs('q1.page')">
                                    Q1
                                </x-nav-link>
                                <x-nav-link href="{{ route('q2.page') }}" :active="request()->routeIs('q2.page')">
                                    Q2
                                </x-nav-link>
                                <x-nav-link href="{{ route('q3.page') }}" :active="request()->routeIs('q3.page')">
                                    Q3
                                </x-nav-link>
                            </div>
                        </div>
                        <div class="flex flex-grow justify-center sm:justify-end">
                            <a class="text-blue-600 text-sm" href="{{ route('code', ['line' => $line]) }}" target="_blank" title="show code">show code</a>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center sm:hidden mx-auto">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('q3.page') }}" :active="request()->routeIs('q3.page')">
                            Q1
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('q2.page') }}" :active="request()->routeIs('q2.page')">
                            Q2
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('q3.page') }}" :active="request()->routeIs('q3.page')">
                            Q3
                        </x-responsive-nav-link>
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main class="pt-16 sm:pt-6 max-w-5xl mx-auto sm:px-6 lg:px-8 pb-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-flashes />
                    {{ $slot }}
                </div>
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>