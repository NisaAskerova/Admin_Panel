<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Nisə',
                'last_name' => 'Əsgərova',
                'email' => 'esgerovanise@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ],
            [
                'first_name' => 'Elvin',
                'last_name' => 'Əliyev',
                'email' => 'elvin.aliyev@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Leyla',
                'last_name' => 'Hüseynova',
                'email' => 'leyla.huseynova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Ramil',
                'last_name' => 'Rzayev',
                'email' => 'ramil.rzayev@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Aysel',
                'last_name' => 'Məmmədova',
                'email' => 'aysel.mammadova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Tural',
                'last_name' => 'Quliyev',
                'email' => 'tural.quliyev@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Zeynəb',
                'last_name' => 'Rəhmanova',
                'email' => 'zeynab.rahmanova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Kamran',
                'last_name' => 'Novruzov',
                'email' => 'kamran.novruzov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Amina',
                'last_name' => 'Qurbanova',
                'email' => 'amina.qurbanova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Fariz',
                'last_name' => 'Məmmədov',
                'email' => 'fariz.mammadov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Vüsal',
                'last_name' => 'İsmayılov',
                'email' => 'vusal.ismayilov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Günay',
                'last_name' => 'Əliyeva',
                'email' => 'gunay.aliyeva@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Rəşad',
                'last_name' => 'Hüseynov',
                'email' => 'reshad.huseynov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Nigar',
                'last_name' => 'Süleymanova',
                'email' => 'nigar.suleymanova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Samir',
                'last_name' => 'Ələkbərov',
                'email' => 'samir.alekberov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
