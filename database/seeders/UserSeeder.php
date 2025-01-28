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
        $users = [
            [
                'name' => 'Amy',
                'email' => 'amy@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'Emma',
                'email' => 'emma@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'Adam',
                'email' => 'adam@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ]
        ];

        User::insert($users);
    }
}
