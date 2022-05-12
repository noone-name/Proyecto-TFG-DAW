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
                        Nombre
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        user_id_cliente
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        user_id_abogado
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        case_types_id
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        description
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        is_active
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        case_document
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
                                    {{ $case->user_id_cliente }}
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
                                    {{ $case->is_active }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="w-8 h-8 rounded-full" src="{{ Storage::url($case->case_document) }}" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-jet-button wire:click='showEditCaseModal({{ $case->id }})'>{{__('Edit')}}</x-jet-button>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-jet-button class='bg-red-700' wire:click='deleteCase({{ $case->id }})'>{{__('Delete')}}</x-jet-button>
                            </td>
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
                            <span class="error">{{ $message }}</span>
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
                            <span class="error">{{ $message }}</span>
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
                                <span class="error">s{{ $message }}</span>
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
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mt-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            for="file_input">Adjuntar Documento</label>
                        <input name="upload" wire:model.lazy="case_document" name="case_document"
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                        @if ($case_document)
                            Photo Preview:
                            <img src="{{ $case_document->temporaryUrl() }}">
                        @endif
                        @if ($oldDoc)
                        Old Doc:
                        <img src="{{ Storage::url($oldDoc) }}">
                    @endif
                        @error('case_document')
                            <span class="error">{{ $message }}</span>
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
                            <span class="error">{{ $message }}</span>
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

</div>
