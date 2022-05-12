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
                        Correo
                    </th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            Link
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            Link
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>



    <div>
        <x-jet-dialog-modal wire:model='showingCaseModal'>
            <x-slot name='title'>{{ __('Create a Legal case') }}</x-slot>


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
                            @error('case_title') <span class="error">{{ $message }}</span> @enderror

                    </div>


                    <div class="mt-3">
                        <label for="user_id_abogado"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige a un
                            Abogado</label>
                        <select id="user_id_abogado" name="user_id_abogado" wire:model.lazy='user_id_abogado' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value='' selected="">Abogados</option>
                            @foreach ($lawyers as $lawyer)
                                <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id_abogado') <span class="error">{{ $message }}</span> @enderror

                    </div>


                    <div class="mt-3">
                        <label for="case_types_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Elige tu tipo de
                            caso</label>
                        <select id="case_types_id" name="case_types_id" wire:model.lazy='case_types_id' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value='' selected="">Tipos de caso</option>
                            @foreach ($case_types as $case_type)
                                <option value="{{ $case_type->id }}">{{ $case_type->name }}</option>
                            @endforeach
                        </select>
                        @error('case_types_id') <span class="error">{{ $message }}</span> @enderror
                    </div>

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
                        @error('client_position') <span class="error">{{ $message }}</span> @enderror

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
                        @error('case_document') <span class="error">{{ $message }}</span> @enderror

                    </div>


                    <div class="mt-3">

                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Breve descripcion
                            del caso</label>
                        <textarea id="description" rows="4" name="description" wire:model='description'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your description..."></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror

                    </div>
                </form>
            </x-slot>



            <x-slot name='footer'>
                <x-jet-button wire:click='storeCase'>{{ __('Store') }}</x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>

</div>
