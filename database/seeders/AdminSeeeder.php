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
        User::create([
            'first_name'=>'Nisə',
            'last_name'=>'Əsgərova',
            'email'=>'esgerovanise@gmail.com',
            'password'=>Hash::make('123456'),
            'role'=>'admin'
        ]);
    }
}
