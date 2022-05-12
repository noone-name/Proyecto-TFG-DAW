<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\CaseType;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Court>
 */
class CourtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'case_types_id' => $this->faker->randomElement(CaseType::pluck('id')),
            'court_name' => $this->faker->company(),
            'court_address' => $this->faker->address(),
        ];
    }




}
