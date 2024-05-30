<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                // 'id' => '2246f1f5-8a0e-40bf-b664-d0ca64fc2e43',
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('2wsx1qaz')
            ],
            [
                // 'id' => '6a9e53fa-a698-4365-b89e-fbdfb7ab0296',
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('2wsx1qaz')
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
