<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Patient;
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
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);

        Patient::factory()
            ->count(100)
            ->afterCreating(function ($model) {
                $model->user->assignRole("patient");
            })
            ->create();

        Doctor::factory()
            ->count(10)
            ->afterCreating(function ($model) {
                $model->user->assignRole("doctor");
            })
            ->create();
        Laboratory::factory()
            ->count(10)
            ->afterCreating(function ($model) {
                $model->user->assignRole("laboratory");
            })
            ->create();

        Appointment::factory()
            ->count(100)
            ->create();

        Doctor::first()->user->update([
            "email" => "doctor@mail.com",
            "password" => Hash::make("doctor1234"),
        ]);

        Laboratory::first()->user->update([
            "email" => "laboratory@mail.com",
            "password" => Hash::make("laboratory1234"),
        ]);

        Patient::first()->user->update([
            "email" => "patient@mail.com",
            "password" => Hash::make("patient1234"),
        ]);
    }
}
