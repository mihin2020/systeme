<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'MIHIN',
                'lastname' => 'hugues aime',
                'email' => 'super-admin@gmail.com',
                'role' => 'Super administrateur',
                'password' => 'password',
            ],
            [
                'firstname' => 'Naoua',
                'lastname' => 'Siessan Lassina',
                'email' => 'lassnaoua@gmail.com',
                'role' => 'Administrateur',
                'password' => 'password',
            ],
        ];
    
        foreach ($users as $user) {
            User::firstOrCreate([
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'role' => $user['role'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
    
}
