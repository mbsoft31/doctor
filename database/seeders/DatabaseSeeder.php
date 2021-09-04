<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Patient;
use Carbon\Carbon;
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
            ->count(15)
            ->afterCreating(function ($model) {
                $model->user->assignRole("doctor");
            })
            ->create();

        Laboratory::factory()
            ->count(4)
            ->afterCreating(function ($model) {
                $model->user->assignRole("laboratory");
            })
            ->create();

        Appointment::factory()
            ->count(200)
            ->create();

        Doctor::first()->update([
            "first_name" => "Amine",
            "last_name" => "Ramdhani",
        ]);
        Doctor::first()->user->update([
            "email" => "doctor@mail.com",
            "password" => Hash::make("password"),
        ]);

        Doctor::find(2)->update([
            "first_name" => "Rania",
            "last_name" => "Harathi",
        ]);
        Doctor::find(2)->user->update([
            "email" => "rania@mail.com",
            "password" => Hash::make("password"),
        ]);

        Laboratory::first()->update([
            "name" => "Mostapha Hacini laboratory",
        ]);
        Laboratory::first()->user->update([
            "email" => "laboratory@mail.com",
            "password" => Hash::make("password"),
        ]);

        Patient::first()->update([
            "first_name" => "Omar",
            "last_name" => "Belmahi",
        ]);
        Patient::first()->user->update([
            "email" => "patient@mail.com",
            "password" => Hash::make("password"),
        ]);

        Patient::find(2)->update([
            "first_name" => "Feriel",
            "last_name" => "Zeghadnia",
        ]);
        Patient::find(2)->user->update([
            "email" => "feriel@mail.com",
            "password" => Hash::make("password"),
        ]);
    }
}
