<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaseCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('case_categories')->delete();
        
        \DB::table('case_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Derecho Civil
',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Penal
',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Laboral
',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Derecho Administrativo
',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Derecho Patrimonial',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}