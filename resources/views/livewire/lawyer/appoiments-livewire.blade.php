<div>
    {{-- Be like water. --}}
    <div class="flex justify-end m-2 p-2">
        <x-jet-button wire:click='showAppoimentModal'> {{__('Create')}} </x-jet-button>
    </div>


    <div class="flex justify-end m-2 p-2">

        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Asunto de la cita
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        User_id_solicitado
                    </th>
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
                                {{ $cita->title_appoiment }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $cita->user_id_solicitado }}
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
                                    <x-jet-button wire:click='showEditAppoimentModal({{ $cita->id }})'>
                                        {{ __('Edit') }}
                                    </x-jet-button>
                                    <x-jet-button class='bg-red-700' wire:click='deleteAppoiment({{ $cita->id }})'>
                                        {{ __('Delete') }}</x-jet-button>
                                @else
                                <x-jet-button wire:click='showAppoimentInfoModal({{ $cita->id }})'>
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
        <x-jet-dialog-modal wire:model='showingAppoimentModal'>
            @if ($isEditMode)
                <x-slot name='title'>{{ __('Edit Appoiment') }}</x-slot>
            @else
                <x-slot name='title'>{{ __('Create Appoiment') }}</x-slot>
            @endif

            <x-slot name='content'>
                <form>
                    @csrf

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
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige tu tipo de
                            caso</label>
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
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start
                            Date/Time</label>
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
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Day?</label>
                        <div class="relative mb-6">
                            @error('checkbox_time')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                            <div class="flex items-center">
                                <input id="checkbox" type="checkbox" value="1" name="checkbox_time"
                                    wire:model.lazy='checkbox_time'
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All
                                    day</label>
                            </div>

                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="relative mb-6">

                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Breve
                                descripcion
                                del caso</label>
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

                <p>Título de la cita: {{$info->title_appoiment}}</p>
                <p>Fecha de la cita :{{$info->start_date}}</p>
                <p>Estado: {{$info->status}}</p>
                <p>Cliente: {{$info->user_id_solicitado}} </p>
                @if ($info->checkbox_time ==true)
                    <p>Cita concertada para todo el dia</p>
                @endif

                @endif

            </x-slot>

            <x-slot name='footer'>

                <x-jet-button wire:click='closeAppoimentInfoModal'>{{ __('Close') }}</x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>

</div>
