<?php

namespace App\Exports;

use App\Models\Tetra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TetrasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Tetra::with(['entite', 'modelTetra'])
            ->get()
            ->map(function ($tetra, $index) {
                return [
                    'N°' => $index + 1,
                    'Numéro de série' => $tetra->serie,
                    'Entité doté' => $tetra->entite->name ?? 'Non défini',
                    'Numéro d\'appel' => $tetra->numero_appel,
                    'Modèle de radio' => $tetra->modelTetra->name ?? 'Non défini',
                    'security_group' => $tetra->security_group,
                    'numero_group' => $tetra->numero_group,
                    'talk_group' => $tetra->talk_group,

                ];
            });
    }

    public function headings(): array
    {
        return [
            'N°',
            'Numéro de série',
            'Entité doté',
            'Numéro d\'appel',
            'Modèle de radio',
            'security_group',
            'numero_group',
            'talk_group',
        ];
    }
}