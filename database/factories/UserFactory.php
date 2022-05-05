<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genres = ['1', '2', '3', '4'];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'gender_id' => $genres[mt_rand(0,count($genres)-1)],

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }

    public function clients()
    {
        return $this->state(function (array $attributes) {

            return [
                'client_dni' => $this->faker->randomNumber(9),
                'client_birth_date' => $this->faker->date(),
                'client_home_address' => $this->faker->address(),
                'client_declarated_address' => $this->faker->address(),
                'client_mobile_phone' => $this->faker->phoneNumber(),
            ];
        });
    }

    public function lawyers()
    {
        return $this->state(function (array $attributes) {
            $workDays = ['I, III, V', 'II, IV'];
            $specialty = ['Derecho Civil', 'Penal', 'Laboral', 'Derecho Administrativo', 'Derecho Patrimonial'];


            return [
                'lawyer_dni' => $this->faker->randomNumber(9),
                'lawyer_mobile_phone' => $this->faker->phoneNumber(),
                'lawyer_specialty' => $specialty[mt_rand(0,count($specialty)-1)],
                'lawyer_licence_number' => $this->faker->randomNumber(6),
                'lawyer_office_name' => $this->faker->catchPhrase(),
                'lawyer_biography' => $this->faker->text(200),
                'lawyer_work_days' => $workDays[mt_rand(0,count($workDays)-1)],

            ];
        });
    }






}
