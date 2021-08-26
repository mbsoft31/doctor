<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(["name" => "admin"]);
        $role_patient = Role::create(["name" => "patient"]);
        $role_doctor = Role::create(["name" => "doctor"]);
        $role_laboratory = Role::create(["name" => "laboratory"]);



    }
}
