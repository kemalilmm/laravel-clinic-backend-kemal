<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'UltraAdmin',
            'email' => 'muhammadkemalim@example.com',
            'role'=>'admin',
            'password'  => Hash::make('Joesjo@'),
            'phone' => fake()->phoneNumber()
        ]);

        \App\Models\ProfileClinic::factory()->create([
            'name'          => 'KIM-Clinic',
            'doctor_name'   => 'doctor name',
            'address'       => 'Bandung Jabar',
            'email'         => 'doc@gmail.com',
            'phone'         => fake()->phoneNumber(),
            'unique_id'     => uniqid()
        ]);

        $this->call([DoctorSeeder::class,DoctorScheduleSeeder::class]);
    }
}
