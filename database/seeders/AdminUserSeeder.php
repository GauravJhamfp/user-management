<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // unique check
            [
                'first_name' => 'Super',
                'last_name'  => 'Admin',
                'email'      => 'admin@example.com',
                'mobile'     => '9999999999',
                'role'       => '0', // 0 = Admin
                'password'   => Hash::make('admin123'),
            ]
        );
    }
}
