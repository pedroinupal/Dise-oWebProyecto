<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new role;
        $role->role = "Sales";
        $role->save();

        $role = new role;
        $role->role = "Warehouse";
        $role->save();

        $role = new role;
        $role->role = "Route";
        $role->save();

        $role = new role;
        $role->role = "Admin";
        $role->save();
    }
}
