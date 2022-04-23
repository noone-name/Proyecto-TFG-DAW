<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genders')->delete();
        
        \DB::table('genders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hombre',
                'created_at' => '2022-04-23 23:26:01',
                'updated_at' => '2022-04-23 23:26:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mujer',
                'created_at' => '2022-04-23 23:26:01',
                'updated_at' => '2022-04-23 23:26:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Prefiero no decirlo',
                'created_at' => '2022-04-23 23:26:01',
                'updated_at' => '2022-04-23 23:26:01',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Otro',
                'created_at' => '2022-04-23 23:26:01',
                'updated_at' => '2022-04-23 23:26:01',
            ),
        ));
        
        
    }
}