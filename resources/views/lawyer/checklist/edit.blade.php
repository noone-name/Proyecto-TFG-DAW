<x-lawyer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <span class="font-medium">Alert!</span> {{ $error }}
                            </div>
                        </div>
                    @endforeach

                @endif



                <form method="POST" action="{{ route('lawyer.checklist_groups.checklists.update',[ $checklistGroup, $checklist]) }}">
                    @csrf
                    @method('PUT')
                    <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('Edit CheckList') }}</label>
                    <input type="text" name="name" id="helper-text" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $checklist->name }}">
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400"></p>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>



            </div>


            <form method="POST" action="{{ route('lawyer.checklist_groups.destroy', $checklistGroup) }}">
                @csrf
                @method('DELETE')
             <button type="submit" onclick="return confirm('{{__('¿Estas seguro de eliminar este grupo?')}}')"
                    class="text-white mt-10 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{__('Delete CheckList')}}</button>
            </form>
        </div>

    </div>
    </div>
</x-lawyer-layout>
