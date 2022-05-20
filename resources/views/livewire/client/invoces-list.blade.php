<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Titulo del caso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Correo del Cliente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Posición en el caso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre del caso
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado del Pago
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cantidad del Pago Restante
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($invocescli as $invoce)
                <tr>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover"
                            src="{{ $client->profile_photo_url }}" alt="{{ $client->name }}" />
                    </div>
                </td> --}}

                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ $invoce->normalcases_inc->case_title }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ $invoce->normalcases_inc->users_abogado->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ $invoce->normalcases_inc->users_abogado->email }}
                        </div>
                    </td>

                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ $invoce->normalcases_inc->client_position }}
                        </div>
                    </td>



                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ $invoce->normalcases_inc->casetype->name }}
                        </div>
                    </td>



                    {{-- Estado del Pago --}}

                    {{-- Estado del Pago --}}
                    @if ($invoce->inv_status == 'Due')
                        <td class="px-6 py-4 ">
                            <div class="flex items-center">
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                    <span class="relative">{{ __('Pendiente de Pago') }}</span>
                                </span>
                            </div>
                        </td>
                    @else
                        @if ($invoce->inv_status == 'Partially Paid')
                            <td class="px-6 py-4 ">
                                <div class="flex items-center">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative"> {{ __('Pagado a medias') }}</span>
                                    </span>
                                </div>
                            </td>
                        @else
                            <td class="px-6 py-4 ">
                                <div class="flex items-center">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ __('Pagado') }}</span>
                                    </span>

                                </div>
                            </td>
                        @endif
                    @endif

                    {{-- Cantidad del Pago Restante --}}

                    @if ($invoce->inv_status == 'Due')
                        <td class="px-6 py-4 ">
                            <div class="flex items-center">
                                {{ $invoce->total_amount }}€
                            </div>
                        </td>
                    @else
                        @if ($invoce->inv_status == 'Partially Paid')
                            <td class="px-6 py-4 ">
                                <div class="flex items-center">
                                    {{ $invoce->total_amount }}€
                                </div>
                            </td>
                        @else
                            <td class="px-6 py-4 ">
                                <div class="flex items-center">
                                    {{ $invoce->total_amount }}€
                                </div>
                            </td>
                        @endif
                    @endif



                    <td class="px-6 py-4 ">
                        <div class="flex items-center">


                            @if ($invoce->normalcases_inc->status == 'Active')
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Activo</span>
                                </span>
                            @endif


                            @if ($invoce->normalcases_inc->status == 'Completed')
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                    <span class="relative">Borrado</span>
                                </span>
                            @endif


                        </div>
                    </td>


                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            <x-jet-button wire:click='showCaseInvoceModal({{ $invoce->id }})'>
                                {{ __('Factura') }}
                            </x-jet-button>
                        </div>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

    <div>
        <x-jet-dialog-modal wire:model='showingCaseInvoceModal'>

            <x-slot name='title'>{{ __('Informacion del cliente: ') }}</x-slot>

            <x-slot name='content'>


                @if ($info)


                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Factura del Caso: ') }} {{ $info->normalcases_inc->case_title }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> lawyer_docs_requirements:</span>
                                {{ $info->normalcases_inc->normalstatus->lawyer_docs_requirements }}

                                <br> <span class="font-bold"> potential_resolution:</span>
                                {{ $info->normalcases_inc->normalstatus->potential_resolution }}

                                <br> <span class="font-bold"> extra_info:</span>
                                {{ $info->normalcases_inc->normalstatus->extra_info }}

                                <br> <span class="font-bold"> description :</span>
                                {{ $info->normalcases_inc->description }}
                                <br> <span class="font-bold"> Estado:</span>
                                {{ $info->normalcases_inc->status }}
                                {{-- <br> <span class="font-bold"> case_document:</span>
                                {{ $info->normalcases_inc->case_document }} --}}
                                <br> <span class="font-bold"> case_document:</span>
                                @if (strpos(Storage::url($info->normalcases_inc->case_document), '.pdf') !== false)
                                    <a href="{{ Storage::url($info->normalcases_inc->case_document) }}"
                                        target="_blank">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ Storage::url($info->normalcases_inc->case_document) }}" />
                                @endif

                                <br> <span class="font-bold"> Estado del pago:</span>
                                @if ($info->inv_status == 'Due')
                                    Pendiente de Pago
                                @else
                                    @if ($info->inv_status == 'Partially Paid')
                                        Pagado a Medias
                                    @else
                                        Pagado
                                    @endif
                                @endif


                                @if ($info->inv_status == 'Due')

                                    <br> <span class="font-bold"> CANTIDAD DEL PAGO RESTANTE:</span>
                                    {{ $info->total_amount }}€
                                @else
                                    @if ($info->inv_status == 'Partially Paid')
                                        <br> <span class="font-bold"> CANTIDAD DEL PAGO RESTANTE:</span>
                                        {{ $info->amount_slope }}€
                                    @else
                                        <br> <span class="font-bold"> CANTIDAD PAGADA:</span>
                                        {{ $info->amount_paid }}€
                                    @endif
                                @endif



                            </p>
                        </div>
                    </span>


                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->normalcases_inc->users_abogado->profile_photo_url }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita creada por: ') }} {{ $info->normalcases_inc->users_abogado->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->normalcases_inc->users_abogado->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->normalcases_inc->users_abogado->email }}
                                <br> <span class="font-bold"> DNI:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_dni }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_mobile_phone }}
                                <br> <span class="font-bold"> Número de Licencia:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_licence_number }}
                                <br> <span class="font-bold"> Especialidad:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_specialty }}
                                <br> <span class="font-bold"> Nombre Oficina:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_office_name }}
                                <br> <span class="font-bold"> Biografía:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_biography }}
                                <br> <span class="font-bold"> Días de Trabajo:</span>
                                {{ $info->normalcases_inc->users_abogado->lawyer_work_days }}
                            </p>
                        </div>
                    </span>


                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->normalcases_inc->users_cliente->profile_photo_url }}"
                            alt="{{ $info->normalcases_inc->users_cliente->name }}">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita Asignada a: ') }} {{ $info->normalcases_inc->users_cliente->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->normalcases_inc->users_cliente->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->normalcases_inc->users_cliente->email }}
                                <br> <span class="font-bold"> DNI / NIF:</span>
                                {{ $info->normalcases_inc->users_cliente->client_dni }}
                                <br> <span class="font-bold"> Fecha de Nacimiento:</span>
                                {{ $info->normalcases_inc->users_cliente->client_birth_date }}
                                <br> <span class="font-bold"> Dirección de Factura:</span>
                                {{ $info->normalcases_inc->users_cliente->client_declarated_address }}
                                <br> <span class="font-bold"> Dirección de Casa:</span>
                                {{ $info->normalcases_inc->users_cliente->client_home_address }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->normalcases_inc->users_cliente->client_mobile_phone }}
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
