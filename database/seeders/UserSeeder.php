<?php

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
                'firstname' => 'MIHIN',
                'lastname' => 'hugues aime',
                'email' => 'super-admin@gmail.com',
                'role' => 'Super administrateur',
                'password' => 'password',
                'statut' => true,
            ],
            [
                'firstname' => 'Naoua',
                'lastname' => 'Siessan Lassina',
                'email' => 'lassnaoua@gmail.com',
                'role' => 'Administrateur',
                'password' => 'password',
                'statut' => true,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // Condition d'unicité
                [
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'role' => $user['role'],
                    'password' => Hash::make($user['password']),
                    'statut' => $user['statut'],
                ]
            );
        }
    }
}
