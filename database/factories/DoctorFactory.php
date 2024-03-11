<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_name' => fake()->name,
            'doctor_specialist' => fake()->word,
            'doctor_email' => fake()->unique()->safeEmail,
            'photo' => null, // Assuming you want to leave photo empty initially
            'address' => fake()->address,
            'sip' => fake()->unique()->numerify('##########'), // Assuming SIP is numeric with 10 digits
        ];
    }
}
