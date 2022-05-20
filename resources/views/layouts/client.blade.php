<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>

    {{-- <!-- Scripts para FullCalendar-->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar/main.css') }}">
    <script src="{{ asset('js/fullcalendar/main.js') }}" defer></script>
    <script src="{{ asset('js/fullcalendar/locales-all.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js" ></script> --}}

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen rounded-b-lg bg-gray-800">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-zinc-200 shadow-gray-500/40 ">
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
    {{-- <script src="{{ asset('js/fullcalendar/schedule.js') }}" defer></script> --}}

    @stack('modals')
    @livewireScripts
    <!-- component -->


<!-- component -->
<!-- This is an example component -->
<div class=" bg-gray-900">
    <div class="max-w-2xl mx-auto text-white py-10">
        <div class="text-center">
            <h3 class="text-3xl mb-3"> Bienvenido a la aplicación gestora </h3>
            <p> Puedes encontrar tambien el codigo del proyecto en: </p>
            <div class="flex justify-center my-10">
                <button>
                    <a href="https://github.com/noonehtml/Proyecto">
                        <div class="flex items-center border  rounded-lg px-4 py-2 w-52 mx-2">
                            <img src="{{ asset('imagenes/generales/github-11-64.png') }}" alt=""
                                class="w-7 md:w-8">
                            <div class="text-left ml-3">
                                <p class='text-xs text-gray-200'>Download on </p>
                                <p class="text-sm md:text-base"> Github </p>
                            </div>
                        </div>
                    </a>
                </button>

                <button>
                    <a href="https://github.com/noonehtml/Proyecto">
                        <div class="flex items-center border  rounded-lg px-4 py-2 w-44 mx-2">
                            <img src="{{ asset('imagenes/generales/google-drive.png') }}" alt=""
                                class="w-7 md:w-8">
                            <div class="text-left ml-3">
                                <p class='text-xs text-gray-200'>Download on </p>
                                <p class="text-sm md:text-base"> Google Drive </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
        </div>
        <div class="mt-28 flex flex-col md:flex-row md:justify-between items-center text-sm text-gray-400">
            <p class="order-2 md:order-1 mt-8 md:mt-0"> &copy; Angel Eduardo. 2022 </p>
            <div class="order-1 md:order-2">
                <span class="px-2">About us</span>
                <span class="px-2 border-l">Contact us</span>
                <span class="px-2 border-l">Privacy Policy</span>
            </div>
        </div>
    </div>
</div>





</body>

</html>
