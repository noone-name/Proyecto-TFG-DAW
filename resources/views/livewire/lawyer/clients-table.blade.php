<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="bg-white px-4 py-3 border-t border-grey-200 sm:px-6">


            <div class="flex bg-white px-4 py-3 sm:px-6">

                <input wire:model='search' type="search" class="form-input rounded-md shadow-sm mt-1 block w-full"
                    placeholder="Search" required>

                <select wire:model='perPage' class=" form-input shadow-sm mt-1 ml-6 block rounded-md outline-none">
                    <option value="5">5 por página</option>
                    <option value="10">10 por página</option>
                    <option value="15">15 por página</option>
                    <option value="20">20 por página</option>
                </select>

                @if ($search !== '')
                    <button class="ml-6 form-input rounded-md shadow-sm mt-1 block " wire:click='clear'>
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                @endif

            </div>





        </div>


        @if ($clients->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Foto
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dni Cliente
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Teléfono
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>

                    <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Accion
                </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ $client->profile_photo_url }}" alt="{{ $client->name }}" />
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $client->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $client->client_dni }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $client->client_mobile_phone }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$client->email}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <x-jet-button wire:click='showClientInfoModal({{ $client->id }})'> Informacion del cliente </x-jet-button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-white px-4 py-3 border-t border-grey-200 sm:px-6">

                {{ $clients->links() }}
            </div>
        @else
            <div class="bg-white px-4 py-3 border-t text-gray-500 border-grey-200 sm:px-6">
                No hay resultados para tu busqueda "{{ $search }}" en la página {{ $page }} al mostrar
                {{ $perPage }}
            </div>

        @endif

    </div>


    <div>
        <x-jet-dialog-modal wire:model='showingClientInfoModal'>

            <x-slot name='title'>{{ __('Informacion del cliente: ') }}</x-slot>

            <x-slot name='content'>
                @if ($info)


                        <span
                            class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="{{ $info->profile_photo_url }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $info->name }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    <br> <span class="font-bold"> Género:</span>
                                    {{ $info->gender->name }}
                                    <br> <span class="font-bold"> Correo:</span>
                                    {{ $info->email }}
                                    <br> <span class="font-bold"> DNI / NIF:</span>
                                    {{ $info->client_dni }}
                                    <br> <span class="font-bold"> Fecha de Nacimiento:</span>
                                    {{ $info->client_birth_date }}
                                    <br> <span class="font-bold"> Dirección de Factura:</span>
                                    {{ $info->client_declarated_address }}
                                    <br> <span class="font-bold"> Dirección de Casa:</span>
                                    {{ $info->client_home_address }}
                                    <br> <span class="font-bold"> Número de Teléfono:</span>
                                    {{ $info->client_mobile_phone }}
                                </p>
                            </div>
                        </span>


                @endif
            </x-slot>

            <x-slot name='footer'>

                <x-jet-button wire:click='closeClientInfoModal'>{{ __('Close') }}</x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>


</div>
