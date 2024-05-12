<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' => 'Admin Worker',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => 4,


        ]);

        User::create([

            'name' => 'Sales Worker',
            'email' => 'sales@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => 1,


        ]);

        User::create([

            'name' => 'Route Worker',
            'email' => 'route@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => 3,


        ]);

        User::create([

            'name' => 'Warehouse Worker',
            'email' => 'warehouse@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => 2,


        ]);
    }
}
