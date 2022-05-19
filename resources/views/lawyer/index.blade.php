<x-lawyer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estado de los casos solicitado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-t from-indigo-900 to-c p-5 overflow-hidden shadow-xl sm:rounded-lg">

                <main class="grid place-items-center min-h-screen bg-gradient-to-t from-blue-300 to-indigo-900 p-5">
                    <div>
                        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-gray-200 mb-5">Bienvenido
                            {{ $user->name }}</h1>
                        <section class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                            <!-- CARD 1 -->
                            <div class="bg-gray-900 shadow-lg rounded p-3">
                                <div class="group relative">
                                    <img class="w-full md:w-72 block rounded"
                                        src="{{ asset('imagenes/generales/images.png') }}" alt="" />
                                    <div
                                        class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">

                                        <a href="{{ route('lawyer.appoiments.index') }}">
                                            <button
                                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-play-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                                </svg>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-white text-lg">Mostrar mis citas y Reuniones</h3>
                                    <p class="text-gray-400">Crea y gestiona tus citas</p>
                                </div>
                            </div>
                            <!-- END OF CARD 1 -->

                            <!-- CARD 2 -->
                            <div class="bg-gray-900 shadow-lg rounded p-3">
                                <div class="group relative">
                                    <img class="w-full md:w-72 block rounded"
                                        src="{{ asset('imagenes/generales/image-case.png') }}" alt="" />
                                    <div
                                        class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">

                                        <a href="{{ route('lawyer.normal_cases_status.index') }}">
                                            <button
                                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-play-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                                </svg>
                                            </button>
                                        </a>


                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-white text-lg">Mostrar mis casos</h3>
                                    <p class="text-gray-400">Aquí gestionar y ver tus casos</p>
                                </div>
                            </div>
                            <!-- END OF CARD 2 -->


                            <!-- CARD 2 -->
                            <div class="bg-gray-900 shadow-lg rounded p-3">
                                <div class="group relative">
                                    <img class="w-full md:w-72 block rounded"
                                        src="{{ asset('imagenes/generales/bill-image.png') }}" alt="" />
                                    <div
                                        class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">

                                        <a href="{{ route('lawyer.invoces.index') }}">
                                            <button
                                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-play-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                                </svg>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-white text-lg">Mostrar mis facturas</h3>
                                    <p class="text-gray-400">Aquí podrás gestionar tus facturas de los clientes</p>
                                </div>
                            </div>
                            <!-- END OF CARD 2 -->

                            <!-- CARD 2 -->
                            <div class="bg-gray-900 shadow-lg rounded p-3">
                                <div class="group relative">
                                    <img class="w-full md:w-72 block rounded"
                                        src="{{ asset('imagenes/generales/user.png') }}" alt="" />
                                    <div
                                        class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">

                                        <a href="{{ route('lawyer.manages.index') }}">
                                            <button
                                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-play-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                                </svg>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-white text-lg">Mostrar los clientes</h3>
                                    <p class="text-gray-400">Aquí podrás ver la información de los cliente</p>
                                </div>
                            </div>
                            <!-- END OF CARD 2 -->

                        </section>
                    </div>
                </main>




            </div>
        </div>

    </div>


</x-lawyer-layout>
