<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\Environment\Console;

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


        User::factory(100)->lawyers()->create()->each(function ($user) {
            $user->assignRole($user->lawyer_specialty);
            $user->givePermissionTo($user->getPermissionsViaRoles());
        });

        User::factory(50)->clients()->create()->each(function ($user) {
            $user->assignRole('Cliente');
        });


    }


}
