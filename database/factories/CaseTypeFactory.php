<?php

namespace Database\Factories;

use App\Models\CaseCategory;
use App\Models\CaseType;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseType>
 */
class CaseTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $case_category = ['Derecho Civil','Derecho Penal','Derecho Laboral','Derecho Administrativo','Derecho Patrimonial'];

        return [
            "name"=>$this->faker->words($nb = 4, $asText = true),
            "amount"=>$this->faker->numberBetween($min = 100, $max = 800),
            'case_category' => $case_category[mt_rand(0,count($case_category)-1)],

        ];
    }
}
