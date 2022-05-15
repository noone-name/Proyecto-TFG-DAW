<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Court;
use App\Models\CaseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'admin',
                'email' => 'admin@admin.es',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender_id' => 4,

        ])->assignRole('admin');

        User::create([
            'name' => 'lawyer',
            'email' => 'lawyer@lawyer.es',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'gender_id' => 4,

    ])->assignRole('Abogado','Derecho Civil','Derecho Penal','Derecho Laboral','Derecho Administrativo','Derecho Patrimonial');

    User::create([
        'name' => 'client',
        'email' => 'client@client.es',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'gender_id' => 4,

])->assignRole('Cliente');



        User::factory(100)->lawyers()->create()->each(function ($user) {
            $case_category = ['Derecho Civil','Derecho Penal','Derecho Laboral','Derecho Administrativo','Derecho Patrimonial'];

            $user->assignRole($case_category[mt_rand(0,count($case_category)-1)]); // assuming 'supscription' was a typo
            $user->assignRole('Abogado');
        });

        User::factory(50)->clients()->create()->each(function ($user) {
            $user->assignRole('Cliente'); // assuming 'supscription' was a typo
        });



        CaseType::factory(40)->create()->each(function ($user) { });




    }


}
