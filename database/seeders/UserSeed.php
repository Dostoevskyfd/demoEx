<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'admin',
                'middlename'=>'admin',
                'lastname'=>'admin',
                'school'=>'aaa',
                'class'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('administrator'),
                'role'=>'admin',
            ],
        ]);
    }
}
