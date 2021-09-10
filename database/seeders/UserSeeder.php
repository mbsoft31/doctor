<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** @var User $admin */
        $admin = User::factory()
            ->create([
                "email" => "admin@mail.com",
                "password" => Hash::make("password"),
            ]);

        $admin->assignRole("admin");
    }
}
