<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'created_at' => '2022-04-23 17:31:14',
                'updated_at' => '2022-04-23 17:31:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cliente',
                'created_at' => '2022-04-23 17:31:14',
                'updated_at' => '2022-04-23 17:31:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Abogado',
                'created_at' => '2022-04-23 17:31:14',
                'updated_at' => '2022-04-23 17:31:14',
            ),
        ));
        
        
    }
}