<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_id' => function () {
                return \App\Models\Doctor::factory();
            },
            'day' => $this->faker->dayOfWeek,
            'time' => $this->faker->time,
            'status' => 'active',
            'note' => $this->faker->optional()->sentence,
        ];
    }
}
