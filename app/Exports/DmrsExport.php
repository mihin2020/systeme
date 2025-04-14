<?php

namespace App\Exports;

use App\Models\Dmr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DmrsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Dmr::with(['entite', 'modelDmr', 'typeDmr'])
            ->get()
            ->map(function ($dmr, $index) {
                return [
                    'N°' => $index + 1,
                    'Numéro de série' => $dmr->serie,
                    'Modèle de radio' => $dmr->modelDmr->name ?? 'Non défini',
                    'Type de radio' => $dmr->typeDmr->name ?? 'Non défini',
                    'Entité doté' => $dmr->entite->name ?? 'Non défini',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'N°',
            'Numéro de série',
            'Modèle de radio',
            'Type de radio',
            'Entité doté'
        ];
    }
}