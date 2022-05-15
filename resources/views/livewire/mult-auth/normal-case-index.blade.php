<div>
    {{-- Be like water. --}}
    <div class="flex justify-end m-2 p-2">
        <x-jet-button wire:click='showCaseModal'>Create </x-jet-button>
    </div>


    <div class="flex justify-end m-2 p-2">


        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Titulo del Caso
                    </th>


                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Abogado
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tipo de Caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Situación en el Caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción del caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado del caso
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @if (!is_null($cases))
                    @foreach ($cases as $case)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $case->case_title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $case->user_id_abogado }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $case->case_types_id }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $case->client_position }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $case->description }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if ($case->status == 'Cancelled')
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-600 opacity-50 rounded-full"></span>
                                            <span class="relative">Borrado
                                            </span>
                                        </span>
                                    @endif

                                    @if ($case->status == 'Pending')
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Pendiente</span>
                                        </span>
                                    @endif

                                    @if ($case->status == 'Active')
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Activo</span>
                                        </span>
                                    @endif


                                </div>
                            </td>

                            @if ($case->is_active != false)
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if (strpos(Storage::url($case->case_document), '.pdf') !== false)
                                        <a href="{{ Storage::url($case->case_document) }}" target="_blank">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </a>
                                    @else
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ Storage::url($case->case_document) }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($case->is_active != false)
                                        @if ($case->status == 'Pending')
                                            <x-jet-button wire:click='showEditCaseModal({{ $case->id }})'>
                                                {{ __('Edit') }}</x-jet-button>

                                            <x-jet-button class='bg-red-700'
                                                wire:click='deleteCase({{ $case->id }})'>
                                                {{ __('Delete') }}</x-jet-button>
                                        @else
                                            <x-jet-button
                                                wire:click='showCaseStatusInfoModal({{ $case->id }})'>
                                                {{ __('Información') }}
                                            </x-jet-button>
                                        @endif
                                    @endif

                                </td>
                            @else
                                <td>
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-600 opacity-50 rounded-full"></span>
                                        <span class="relative">Borrado</span>
                                    </span>
                                </td>
                            @endif


                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>



    <div>
        <x-jet-dialog-modal wire:model='showingCaseModal'>
            @if ($isEditMode)
                <x-slot name='title'>{{ __('Edit a Legal case') }}</x-slot>
            @else
                <x-slot name='title'>{{ __('Create a Legal case') }}</x-slot>
            @endif

            <x-slot name='content'>
                <form>
                    @csrf
                    <div class="mt-3">
                        <label for="case_title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titulo del
                            Caso</label>
                        <input type="text" id="case_title" name="case_title" wire:model.lazy='case_title'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="case_title" required>
                        @error('case_title')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="mt-3">
                        <label for="selectedClass"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige tu tipo de
                            caso</label>
                        <select id="selectedClass" name="selectedClass" wire:model="selectedClass" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Elige tu tipo de Caso</option>
                            @foreach ($classes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedClass')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (!is_null($sections))
                        <div class="mt-3">
                            <label for="selectedSection"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige a un
                                Abogado</label>
                            <select id="selectedSection" name="selectedSection" wire:model="selectedSection" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select a Section</option>
                                @foreach ($sections as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedSection')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror

                        </div>


                    @endif



                    <div class="mt-3">
                        <label for="client_position"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Situacion en el
                            Caso</label>
                        <select id="client_position" name="client_position" wire:model.lazy='client_position' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value='' selected="">Posicion en el caso</option>
                            <option value="Respondent">Demandado</option>
                            <option value="Petitioner">Demandante</option>
                        </select>
                        @error('client_position')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mt-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            for="file_input">Adjuntar Documento</label>
                        <input name="upload" wire:model.lazy="case_document" name="case_document"
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">

                        @if ($oldDoc)


                            @if (strpos(Storage::url($oldDoc), '.pdf') !== false)
                                <a href="{{ Storage::url($oldDoc) }}" target="_blank">
                                    <iframe src="{{ Storage::url($oldDoc) }}" width="100%" height="300"></iframe>
                                </a>
                            @else
                                <img src="{{ Storage::url($oldDoc) }}" width="50%" height="200">
                            @endif

                        @endif

                        @error('case_document')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="mt-3">

                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Breve descripcion
                            del caso</label>
                        <textarea id="description" rows="4" name="description" wire:model='description'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your description..."></textarea>
                        @error('description')
                            <span class="error text-red-600">{{ $message }}</span>
                        @enderror

                    </div>
                </form>
            </x-slot>



            <x-slot name='footer'>
                @if ($isEditMode)
                    <x-jet-button wire:click='updateCase'>{{ __('Update') }}</x-jet-button>
                @else
                    <x-jet-button wire:click='storeCase'>{{ __('Save') }}</x-jet-button>
                @endif
            </x-slot>

        </x-jet-dialog-modal>
    </div>


    <div>
        <x-jet-dialog-modal wire:model='showingCaseStatusInfoModal'>

            <x-slot name='title'>{{ __('Case Info') }}</x-slot>

            <x-slot name='content'>


            </x-slot>

            <x-slot name='footer'>
                <x-jet-button wire:click='closeAppoimentInfoModal'>{{ __('Close') }}</x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>

</div>
