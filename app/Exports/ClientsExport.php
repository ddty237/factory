<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ClientsExport implements FromCollection, WithStrictNullComparison, WithHeadings
{

    public function collection()
    {
        return Client::get()->map(function($item, $key){
            $data = [
                'Designation' => $item->designation,
                'Code postal' => $item->code_postal,
                'Adresse' => $item->adresse,
                'Délégation' => $item->ville->delegation->name,
                'Téléphone' => $item->phone,
                'Téléphone 2' => $item->secondary_phone,
                'Site web' => $item->website,
                'Reference de titre' => $item->reference_titre,
                'Compte auxilliaire' => $item->compte_auxilliaire,
                'ville' => $item->ville->name,
                'Catégorie' => $item->categorie->name
            ];
            return $data;
        });
    }

    public function headings(): array
    {
        return [
            'Désignation',
            'Boite postale',
            'Adresse',
            'Délégation',
            'Numéro de téléphone',
            'Numéro de téléphone 2',
            'Site web',
            'Reference de titre',
            'Compte auxilliaire',
            'Ville',
            'Catégorie'
        ];
    }
}
