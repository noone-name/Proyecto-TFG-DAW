<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender_id' => $input['gender_id'],
        
            'client_dni' => $input['client_dni'] ?? null,
            'client_birth_date' => $input['client_birth_date'] ?? null,
            'client_home_address' => $input['client_home_address'] ?? null,
            'client_mobile_phone' => $input['client_mobile_phone'] ?? null,
            'client_declarated_address' => $input['client_declarated_address'] ?? null,

            'lawyer_dni' => $input['lawyer_dni'] ?? null,
            'lawyer_mobile_phone' => $input['lawyer_mobile_phone'] ?? null,
            'lawyer_licence_number' => $input['lawyer_licence_number'] ?? null,
            'lawyer_specialty' => $input['lawyer_specialty'] ?? null,
            'lawyer_office_name' => $input['lawyer_office_name'] ?? null,
            'lawyer_biography' => $input['lawyer_biography'] ?? null,
            'lawyer_work_days' => $input['lawyer_work_days'] ?? null,
        ])->assignRole($input['role_id']);

        
    }
}
