<?php

namespace Database\Seeders;

use App\Models\Entite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = [
            'Police Nationale',
            'Gendarmerie Nationale',
            'Société de Sécurité',
        ];

        foreach ($entities as $entity) {
            Entite::firstOrCreate(['name' => $entity]);
        }
    }
}
