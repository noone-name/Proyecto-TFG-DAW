<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                case_title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                users_abogado->name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                users_abogado->email
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
