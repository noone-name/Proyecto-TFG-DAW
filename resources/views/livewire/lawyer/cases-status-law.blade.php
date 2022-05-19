<div>
    <x-jet-button wire:click='ProximosCasos'> {{ __('Proximas Citas') }} </x-jet-button>
    <x-jet-button wire:click='CasosPorConfirmar'> {{ __('Por confirmar Citas') }} </x-jet-button>
    <x-jet-button wire:click='HistoricoDeCitas'> {{ __('Historial de Citas') }} </x-jet-button>

    {{ $test }}
    <div class="flex justify-end m-2 p-2">

        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Título del caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cliente del caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tipo de Caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Situacíon del cliente
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Documentos
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($casesstatus as $status)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $status->normalcases->case_title }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $status->normalcases->user_id_cliente }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $status->normalcases->description }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $status->normalcases->casetype->name }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $status->normalcases->client_position }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                @if ($status->normalcases->status == 'Rejected')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-500 opacity-50 rounded-full"></span>
                                        <span class="relative">Rechazado
                                        </span>
                                    </span>
                                @endif

                                @if ($status->normalcases->status == 'Cancelled')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                        <span class="relative">Borrado</span>
                                    </span>
                                @endif

                                @if ($status->normalcases->status == 'Pending')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Pendiente</span>
                                    </span>
                                @endif

                                @if ($status->normalcases->status == 'Active')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Activo</span>
                                    </span>
                                @endif


                            </div>
                        </td>

                        @if ($status->normalcases->is_active != false)
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if (strpos(Storage::url($status->normalcases->case_document), '.pdf') !== false)
                                    <a href="{{ Storage::url($status->normalcases->case_document) }}" target="_blank">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ Storage::url($status->normalcases->case_document) }}" />
                                @endif
                            </td>
                        @else
                            <td>
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                    <span class="relative">Borrado</span>
                                </span>
                            </td>
                        @endif

                        @if ($status->normalcases->is_active != false)
                            <td>
                                @if ($status->normalcases->status == 'Pending')
                                    <button type="button" wire:click='showCaseStatusModal({{ $status->id }})'
                                        class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-4 py-2.5 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button type="button" wire:click='showRejectCaseStatusModal({{ $status->id }})'
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-4 py-2.5 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                @else
                                    <x-jet-button
                                        wire:click='showCaseStatusInfoModal({{ $status->normalcases->id }})'>
                                        {{ __('Información') }}
                                    </x-jet-button>
                                @endif
                            </td>
                        @else
                            <td>
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-red-600 opacity-50 rounded-full"></span>
                                    <span class="relative">Cancelado</span>
                                </span>
                            </td>
                        @endif


                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>

    <div>
        <x-jet-dialog-modal wire:model='showingCaseStatusModal'>
            @if ($isEditMode)
                <x-slot name='title'>{{ __('Rechazar Caso') }}</x-slot>
            @else
                <x-slot name='title'>{{ __('Aceptar Caso') }}</x-slot>
            @endif

            <x-slot name='content'>
                <form>
                    @csrf

                    @if ($isEditMode)
                        <div class="mt-3">
                            <div class="relative mb-6">

                                <label for="cancel_answer"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Razón del
                                    rechazo del caso</label>
                                @error('cancel_answer')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                                <textarea id="cancel_answer" rows="3" name="cancel_answer" wire:model='cancel_answer'
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your cancel_answer..."></textarea>

                            </div>
                        </div>
                    @else
                        <div class="mt-3">
                            <div class="relative mb-6">

                                <label for="lawyer_docs_requirements"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Información
                                    de la documentación necesaria</label>
                                @error('lawyer_docs_requirements')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                                <textarea id="lawyer_docs_requirements" rows="3" name="lawyer_docs_requirements" wire:model='lawyer_docs_requirements'
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Informe de los posibles documentos necesarios para el caso del cliente..."></textarea>

                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="relative mb-6">

                                <label for="potential_resolution"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Informe de
                                    posibles desenlaces una vez tramitado el caso </label>
                                @error('potential_resolution')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                                <textarea id="potential_resolution" rows="3" name="potential_resolution" wire:model='potential_resolution'
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Introducir resolución potencial para el caso del cliente..."></textarea>

                            </div>
                        </div>


                        <div class="mt-3">
                            <div class="relative mb-6">

                                <label for="extra_info"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Información
                                    extra para el cliente </label>
                                @error('extra_info')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                                <textarea id="extra_info" rows="3" name="extra_info" wire:model='extra_info'
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Introducir información extra para el caso del cliente..."></textarea>

                            </div>
                        </div>
                    @endif
                </form>
            </x-slot>

            <x-slot name='footer'>
                @if ($isEditMode)
                    <x-jet-button wire:click='rejectCaseStatus'>{{ __('Reject') }}</x-jet-button>
                @else
                    <x-jet-button wire:click='updateCaseStatus'>{{ __('Save') }}</x-jet-button>
                @endif
            </x-slot>

        </x-jet-dialog-modal>
    </div>


    <div>
        <x-jet-dialog-modal wire:model='showingCaseStatusInfoModal'>

            <x-slot name='title'>{{ __('Informacion del cliente: ') }}</x-slot>

            <x-slot name='content'>
                @if ($info)



                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Factura del Caso: ') }} {{ $info->case_title }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> lawyer_docs_requirements:</span>
                                {{ $info->normalstatus->lawyer_docs_requirements }}

                                <br> <span class="font-bold"> potential_resolution:</span>
                                {{ $info->normalstatus->potential_resolution }}

                                <br> <span class="font-bold"> extra_info:</span>
                                {{ $info->normalstatus->extra_info }}

                                <br> <span class="font-bold"> description :</span>
                                {{ $info->description }}
                                <br> <span class="font-bold"> Estado:</span>
                                {{ $info->status }}

                                <br> <span class="font-bold"> case_document:</span>
                                @if (strpos(Storage::url($info->case_document), '.pdf') !== false)
                                    <a href="{{ Storage::url($info->case_document) }}" target="_blank">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ Storage::url($info->case_document) }}" />
                                @endif

                                <br> <span class="font-bold"> Estado del pago:</span>
                                @if ($info->caseinvoce->inv_status == 'Due')
                                    Pendiente de Pago
                                @else
                                    @if ($info->caseinvoce->inv_status == 'Partially Paid')
                                        Pagado a Medias
                                    @else
                                        Pagado
                                    @endif
                                @endif

                                @if ($info->caseinvoce->inv_status == 'Due')

                                    <br> <span class="font-bold"> CANTIDAD DEL PAGO RESTANTE:</span>
                                    {{ $info->caseinvoce->total_amount }}€
                                @else
                                    @if ($info->caseinvoce->inv_status == 'Partially Paid')
                                        <br> <span class="font-bold"> CANTIDAD DEL PAGO RESTANTE:</span>
                                        {{ $info->caseinvoce->amount_slope }}€
                                    @else
                                        <br> <span class="font-bold"> CANTIDAD PAGADA:</span>
                                        {{ $info->caseinvoce->amount_paid }}€
                                    @endif
                                @endif


                            </p>
                        </div>
                    </span>


                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->users_cliente->profile_photo_url }}"
                            alt="{{ $info->users_cliente->name }}">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita Asignada a: ') }} {{ $info->users_cliente->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->users_cliente->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->users_cliente->email }}
                                <br> <span class="font-bold"> DNI / NIF:</span>
                                {{ $info->users_cliente->client_dni }}
                                <br> <span class="font-bold"> Fecha de Nacimiento:</span>
                                {{ $info->users_cliente->client_birth_date }}
                                <br> <span class="font-bold"> Dirección de Factura:</span>
                                {{ $info->users_cliente->client_declarated_address }}
                                <br> <span class="font-bold"> Dirección de Casa:</span>
                                {{ $info->users_cliente->client_home_address }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->users_cliente->client_mobile_phone }}
                            </p>
                        </div>
                    </span>




                    <span
                        class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ $info->users_abogado->profile_photo_url }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ __('Cita creada por: ') }} {{ $info->users_abogado->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <br> <span class="font-bold"> Género:</span>
                                {{ $info->users_abogado->gender->name }}
                                <br> <span class="font-bold"> Correo:</span>
                                {{ $info->users_abogado->email }}
                                <br> <span class="font-bold"> DNI:</span>
                                {{ $info->users_abogado->lawyer_dni }}
                                <br> <span class="font-bold"> Número de Teléfono:</span>
                                {{ $info->users_abogado->lawyer_mobile_phone }}
                                <br> <span class="font-bold"> Número de Licencia:</span>
                                {{ $info->users_abogado->lawyer_licence_number }}
                                <br> <span class="font-bold"> Especialidad:</span>
                                {{ $info->users_abogado->lawyer_specialty }}
                                <br> <span class="font-bold"> Nombre Oficina:</span>
                                {{ $info->users_abogado->lawyer_office_name }}
                                <br> <span class="font-bold"> Biografía:</span>
                                {{ $info->users_abogado->lawyer_biography }}
                                <br> <span class="font-bold"> Días de Trabajo:</span>
                                {{ $info->users_abogado->lawyer_work_days }}
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
