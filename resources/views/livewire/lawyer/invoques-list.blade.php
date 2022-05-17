<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}







<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                case_title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                users_cliente->name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                users_cliente->email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                normalcases_inc->client_position
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                casetype->name
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
        @foreach ($invoces as $invoce)
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
                        {{ $invoce->normalcases_inc->users_cliente->name }}
                    </div>
                </td>
                <td class="px-6 py-4 ">
                    <div class="flex items-center">
                        {{ $invoce->normalcases_inc->users_cliente->email }}
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
                @if ($invoce->inv_status == 'Due')
                    <td class="px-6 py-4 ">
                        <div class="flex items-center">
                            {{ __('Pendiente de Pago') }}
                        </div>
                    </td>
                @else
                    @if ($invoce->inv_status == 'Partially Paid')
                        <td class="px-6 py-4 ">
                            <div class="flex items-center">
                                {{ __('Pagado a medias') }}
                            </div>
                        </td>
                    @else
                        <td class="px-6 py-4 ">
                            <div class="flex items-center">
                                {{ __('Pagado') }}
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
                        {{ $invoce->normalcases_inc->status }}
                    </div>
                </td>

                <td class="px-6 py-4 ">
                    <div class="flex items-center">
                        <x-jet-button class="mr-2"> {{ __('Info') }} </x-jet-button>
                        <x-jet-button> {{ __('Info') }} </x-jet-button>
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>


</div>


<div>
    <x-jet-dialog-modal wire:model='showingCasetInfoModal'>

        <x-slot name='title'>{{ __('Informacíon de todo el caso') }}</x-slot>

        <x-slot name='content'>

{{--
            @if ($info)


                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita: ') }} {{ $info->title_appoiment }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Fecha de la cita:</span>
                                {{ $info->start_date }}
                                <br> <span class="font-bold"> Estado:</span> {{ $info->status }}
                                @if ($info->checkbox_time == true)
                                    <br> <span class="font-bold"> Cita concertada para todo el dia</span>
                                @endif
                            </p>
                        </div>
                    </span>

                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->users_solicitado->profile_photo_url }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita Asignada a: ') }} {{ $info->users_solicitado->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->users_solicitado->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->users_solicitado->email }}
                                <br> <span class="font-bold"> DNI / NIF:</span>
                                {{ $info->users_solicitado->client_dni }}
                                <br> <span class="font-bold"> Fecha de Nacimiento:</span>
                                {{ $info->users_solicitado->client_birth_date }}
                                <br> <span class="font-bold"> Dirección de Factura:</span>
                                {{ $info->users_solicitado->client_declarated_address }}
                                <br> <span class="font-bold"> Dirección de Casa:</span>
                                {{ $info->users_solicitado->client_home_address }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->users_solicitado->client_mobile_phone }}
                            </p>
                        </div>
                    </span>

                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->users_solicitante->profile_photo_url }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita creada por: ') }} {{ $info->users_solicitante->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->users_solicitante->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->users_solicitante->email }}
                                <br> <span class="font-bold"> DNI:</span>
                                {{ $info->users_solicitante->lawyer_dni }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->users_solicitante->lawyer_mobile_phone }}
                                <br> <span class="font-bold"> Número de Licencia:</span>
                                {{ $info->users_solicitante->lawyer_licence_number }}
                                <br> <span class="font-bold"> Especialidad:</span>
                                {{ $info->users_solicitante->lawyer_specialty }}
                                <br> <span class="font-bold"> Nombre Oficina:</span>
                                {{ $info->users_solicitante->lawyer_office_name }}
                                <br> <span class="font-bold"> Biografía:</span>
                                {{ $info->users_solicitante->lawyer_biography }}
                                <br> <span class="font-bold"> Días de Trabajo:</span>
                                {{ $info->users_solicitante->lawyer_work_days }}
                            </p>
                        </div>
                    </span>


            @endif --}}

        </x-slot>


        <x-slot name='footer'>

            <x-jet-button wire:click='closeAppoimentInfoModal'>{{ __('Close') }}</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
