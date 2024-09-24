<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@nhpc.com',
            'username' => 'test',
            'password' => Hash::make('Admin2024!'),

        ]);

        $this->command->line('Super admin user created');
        $this->command->line('email: superadmin@nhpc.com');
        $this->command->line('password: Admin2024!');
    }
}
