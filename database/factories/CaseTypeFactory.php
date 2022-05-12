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
        return [
            'case_categories_id' => $this->faker->randomElement(CaseCategory::pluck('id')),
            "name"=>$this->faker->words($nb = 4, $asText = true),
            "amount"=>$this->faker->numberBetween($min = 100, $max = 800),
        ];
    }
}
