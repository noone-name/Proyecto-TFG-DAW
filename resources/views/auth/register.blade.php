<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

 
        <form method="POST" id='register_form' action="{{ route('register') }}"  @if (old('role_id')=='client' ) x-data="{role_id: 'client'}"  @elseif (old('role_id')=='lawyer' ) x-data="{role_id: 'lawyer'}"    @endif    x-data="{role_id: 0}">
            @csrf
            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                <select require onchange="notify()" name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected :disabled="true">Registrarse como:</option>
                  @foreach ($roles as $role )
                        <option value="{{$role->name}}" >{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
      
    

            <div class="mt-4" x-show="role_id != 0">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4" x-show="role_id != 0">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4" x-show="role_id != 0">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4" x-show="role_id != 0">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4" x-show="role_id != 0">
                <x-jet-label for="gender_id" value="{{ __('Sexo') }}" />
                <select name="gender_id" id="gender_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($gender as $gender )
                        <option value="{{$gender->id}}" >{{$gender->name}}</option>
                    @endforeach
                </select>
            </div> 


            <div class="mt-4" x-show="role_id == 'lawyer'">
                <x-jet-label for="client_dni" value="{{ __('Dni / Nif') }}" />
                <x-jet-input id="client_dni" class="clear-input block mt-1 w-full" type="text"  name="client_dni"/>
            </div>

            <div class="mt-4" x-show="role_id == 'lawyer'">
                <x-jet-label for="client_birth_date" value="{{ __('Fecha de Nacimiento') }}" />
                <x-jet-input id="client_birth_date" :value="old('client_birth_date')" class="clear-input block mt-1 w-full" type="date" name="client_birth_date"/>
            </div>

            <div class="mt-4" x-show="role_id == 'lawyer'">
                <x-jet-label for="client_home_address" value="{{ __('Domicilio / Residencia') }}" />
                <x-jet-input id="client_home_address"  :value="old('client_home_address')" class="clear-input block mt-1 w-full" type="text" name="client_home_address"/>
            </div>

            <div class="mt-4" x-show="role_id == 'lawyer'">
                <x-jet-label for="client_mobile_phone" value="{{ __('Teléfono Móvil') }}" />
                <x-jet-input id="client_mobile_phone"  :value="old('client_mobile_phone')" class="clear-input block mt-1 w-full" type="text" name="client_mobile_phone" />
            </div>

            <div class="mt-4" x-show="role_id == 'lawyer'">
                <x-jet-label for="client_declarated_address" value="{{ __('Dirección de Facturación') }}" />
                <x-jet-input id="client_declarated_address"  :value="old('client_declarated_address')" class="clear-input block mt-1 w-full" type="text" name="client_declarated_address" />
            </div>
            
            



            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_dni" value="{{ __('Dni / Nif') }}" />
                <x-jet-input id="lawyer_dni" :value="old('lawyer_dni')"  class="clear-input block mt-1 w-full" type="text" name="lawyer_dni"/>
            </div>

            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_mobile_phone" value="{{ __('Teléfono Móvil') }}" />
                <x-jet-input id="lawyer_mobile_phone" :value="old('lawyer_mobile_phone')" class="clear-input block mt-1 w-full" type="text" name="lawyer_mobile_phone"/>
            </div>

            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_licence_number" value="{{ __('N. Colegiado') }}" />
                <x-jet-input id="lawyer_licence_number" :value="old('lawyer_licence_number')" class="clear-input block mt-1 w-full" type="text" name="lawyer_licence_number"/>
            </div>
            
            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_specialty" value="{{ __('Especialidad') }}" />
                <x-jet-input id="lawyer_specialty" :value="old('lawyer_specialty')" class="clear-input block mt-1 w-full" type="text" name="lawyer_specialty"/>
            </div>

            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_office_name" value="{{ __('Despacho de Abogado') }}" />
                <x-jet-input id="lawyer_office_name" :value="old('lawyer_office_name')" class="clear-input block mt-1 w-full" type="text" name="lawyer_office_name" />
            </div>

            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_biography" value="{{ __('Biografía / Presentación') }}" />
                <x-jet-input id="lawyer_biography" :value="old('lawyer_biography')" class="clear-input block mt-1 w-full" type="text" name="lawyer_biography" />
            </div>

            <div class="mt-4" x-show="role_id == 'client'">
                <x-jet-label for="lawyer_work_days" value="{{ __('Disponibilidad') }}" />
                <x-jet-input id="lawyer_work_days" :value="old('lawyer_work_days')" class="clear-input block mt-1 w-full" type="text" name="lawyer_work_days" />
            </div>




            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

  
          
            <div class="flex items-center justify-between mt-4" >
                        
                <a class="ml-4 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('welcome') }}" >
                    {{ __('Volver') }}
                </a>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4" x-show="role_id != 0" >
                    {{ __('Register') }}
                </x-jet-button>

     
            </div>

     

   
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
