<?php

namespace App\Exports;

use App\Models\Elte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EltesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Elte::with(['entite', 'modelElte'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($elte, $index) {
                return [
                    'N°' => $index + 1,
                    'Numéro de série' => $elte->serie,
                    'Numéro appel' => $elte->numero_appel,
                    'Modèle de radio' => $elte->modelElte->name ?? 'Non défini',
                    'Entité doté' => $elte->entite->name ?? 'Non défini',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'N°',
            'Numéro de série',
            'Numéro appel',
            'Modèle de radio',
            'Entité doté'
        ];
    }
}