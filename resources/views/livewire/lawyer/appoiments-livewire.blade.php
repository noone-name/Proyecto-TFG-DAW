<div>
    {{-- Be like water. --}}
    <div class="flex justify-end m-2 p-2">
        <x-jet-button wire:click='showAppoimentModal'> {{ __('Create') }} </x-jet-button>
    </div>

    <x-jet-button wire:click='ProximasCitas'> {{ __('Proximas Citas') }} </x-jet-button>
    <x-jet-button wire:click='CitasPendientesAceptar'> {{ __('Citas no confirmadas') }} </x-jet-button>
    <x-jet-button wire:click='HistoricoDeCitas'> {{ __('Historial de Citas') }} </x-jet-button>
    <x-jet-button wire:click='CitasPorConfirmar'> {{ __('Citas por Aceptar') }} </x-jet-button>

    <div class="flex justify-end m-2 p-2">


        <table class="w-full divide-y divide-gray-200 table-fixed">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Creado por
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Asunto de la cita
                    </th>

                    @if ($appoimentClient === true)
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Solicitado por') }}
                        </th>
                    @else
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cliente
                        </th>
                    @endif

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Dia de la Cita
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción de la cita
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($citas as $cita)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if ($appoimentClient === true || Auth::user()->id === $cita->users_solicitado->id)
                                    <span
                                        class="flex rounded-full bg-teal-500 px-2 py-1 text-sm font-bold mr-3 text-slate-50">
                                        {{ __('Cliente') }}</span>
                                @else
                                    <span
                                        class="flex rounded-full bg-orange-600 px-2 py-1 text-sm font-bold mr-3 text-slate-50">
                                        {{ __('Abogado') }}</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $cita->title_appoiment }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if ($appoimentClient === true)
                                    {{ $cita->users_solicitante->name }}
                                @else
                                    @if (Auth::user()->id === $cita->users_solicitado->id)
                                        {{ $cita->users_solicitante->name }}
                                    @else
                                        {{ $cita->users_solicitado->name }}
                                    @endif
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $cita->start_date }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $cita->description }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                @if ($cita->status == 'Rejected')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-500 opacity-50 rounded-full"></span>
                                        <span class="relative">Rechazado
                                        </span>
                                    </span>
                                @endif

                                @if ($cita->status == 'Cancelled')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                        <span class="relative">Borrado</span>
                                    </span>
                                @endif

                                @if ($cita->status == 'Pending')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Pendiente</span>
                                    </span>
                                @endif

                                @if ($cita->status == 'Active')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Activo</span>
                                    </span>
                                @endif

                            </div>
                        </td>

                        @if ($cita->is_active != false)
                            <td>
                                @if ($cita->status == 'Pending')
                                    @if ($appoimentClient)
                                        <button type="button"
                                            wire:click='confirmAppoimentFromLawyyers({{ $cita->id }})'
                                            class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-4 py-2.5 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                        </button>
                                        <button type="button"
                                            wire:click='rejectAppoimentFromLawyyers({{ $cita->id }})'
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-4 py-2.5 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    @else
                                        @if (Auth::user()->id === $cita->users_solicitado->id)
                                            <span
                                                class="relative items-center inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-blue-600 opacity-50 rounded-full"></span>
                                                <span class="relative">Gestionado por Abogado</span>
                                            </span>
                                        @else
                                            <x-jet-button wire:click='showEditAppoimentModal({{ $cita->id }})'>
                                                {{ __('Edit') }}
                                            </x-jet-button>
                                            <x-jet-button wire:click='deleteAppoiment({{ $cita->id }})'>
                                                {{ __('Delete') }}</x-jet-button>
                                        @endif
                                    @endif
                                @else
                                    <x-jet-button wire:click='showAppoimentInfoModal({{ $cita->id }})'>
                                        {{ __('Información') }}
                                    </x-jet-button>
                                @endif
                            </td>
                        @else
                            <td>
                                <x-jet-button wire:click='showAppoimentInfoModal({{ $cita->id }})'>
                                    {{ __('Información') }}
                                </x-jet-button>
                            </td>
                        @endif

                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>


    <div>
        <x-jet-dialog-modal wire:model='showingAppoimentModal'>
            @if ($isEditMode)
                <x-slot name='title'>{{ __('Edit Appoiment') }}</x-slot>
            @else
                <x-slot name='title'>{{ __('Create Appoiment') }}</x-slot>
            @endif

            <x-slot name='content'>
                <form>
                    @csrf
                    <div class="mt-3">
                        <label for="input-group-1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Título de la
                            cita</label>
                        @error('title_appoiment')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror
                        <div class="relative mb-6">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input required type="text" id="title" wire:model.lazy='title_appoiment'
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Breve descripción del evento">
                        </div>

                    </div>

                    <div class="mt-3">
                        <label for="user_id_cliente"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige al
                            Cliente</label>
                        @error('user_id_cliente')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror
                        <select id="user_id_cliente" name="user_id_cliente" wire:model="user_id_cliente" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Elige al Cliente</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mt-3">
                        <label for="input-group-1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Día de la
                            reunión</label>
                        @error('start_date')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror
                        <div class="relative mb-6">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input required type="datetime-local" id="start" wire:model.lazy='start_date'
                                min="{{ Carbon\Carbon::now()->format('Y-m-d\Th:i') }}"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Breve descripción del evento">
                        </div>
                    </div>


                    <div class="mt-3">
                        <label for="input-group-1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Desea reservar todo
                            el día?</label>
                        <div class="relative mb-6">
                            @error('checkbox_time')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                            <div class="flex items-center">
                                <input id="checkbox" type="checkbox" value="1" name="checkbox_time"
                                    wire:model.lazy='checkbox_time'
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Todo el
                                    día</label>
                            </div>

                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="relative mb-6">

                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Breve
                                descripcion del caso</label>
                            @error('description')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                            <textarea id="description" rows="4" name="description" wire:model='description'
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your description..."></textarea>

                        </div>
                    </div>





                </form>
            </x-slot>

            <x-slot name='footer'>
                @if ($isEditMode)
                    <x-jet-button wire:click='updateAppoiment'>{{ __('Update') }}</x-jet-button>
                @else
                    <x-jet-button wire:click='storeAppoiment'>{{ __('Save') }}</x-jet-button>
                @endif
            </x-slot>

        </x-jet-dialog-modal>
    </div>


    <div>
        <x-jet-dialog-modal wire:model='showingAppoimentInfoModal'>

            <x-slot name='title'>{{ __('Appoiment Info') }}</x-slot>


            <x-slot name='content'>


                @if ($info)

                    @if ($appoimentClient === true || Auth::user()->id === $info->users_solicitado->id)

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
                                    <br> <span class="font-bold"> DNI:</span>
                                    {{ $info->users_solicitado->lawyer_dni }}
                                    <br> <span class="font-bold"> Número de Teléfono:</span>
                                    {{ $info->users_solicitado->lawyer_mobile_phone }}
                                    <br> <span class="font-bold"> Número de Licencia:</span>
                                    {{ $info->users_solicitado->lawyer_licence_number }}
                                    <br> <span class="font-bold"> Especialidad:</span>
                                    {{ $info->users_solicitado->lawyer_specialty }}
                                    <br> <span class="font-bold"> Nombre Oficina:</span>
                                    {{ $info->users_solicitado->lawyer_office_name }}
                                    <br> <span class="font-bold"> Biografía:</span>
                                    {{ $info->users_solicitado->lawyer_biography }}
                                    <br> <span class="font-bold"> Días de Trabajo:</span>
                                    {{ $info->users_solicitado->lawyer_work_days }}
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
                                    <br> <span class="font-bold"> DNI / NIF:</span>
                                    {{ $info->users_solicitante->client_dni }}
                                    <br> <span class="font-bold"> Fecha de Nacimiento:</span>
                                    {{ $info->users_solicitante->client_birth_date }}
                                    <br> <span class="font-bold"> Dirección de Factura:</span>
                                    {{ $info->users_solicitante->client_declarated_address }}
                                    <br> <span class="font-bold"> Dirección de Casa:</span>
                                    {{ $info->users_solicitante->client_home_address }}
                                    <br> <span class="font-bold"> Número de Teléfono:</span>
                                    {{ $info->users_solicitante->client_mobile_phone }}
                                </p>
                            </div>
                        </span>
                    @else
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


                    @endif

                @endif

            </x-slot>


            <x-slot name='footer'>

                <x-jet-button wire:click='closeAppoimentInfoModal'>{{ __('Close') }}</x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>

</div>
