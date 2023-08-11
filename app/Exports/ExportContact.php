<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportContact implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Contact::with('files')->get();
    }

    /**
     * @var Contact $contact
     */
    public function map($contact): array
    {
        return [
            $contact->id,
            $contact->first_name,
            $contact->name,
            $contact->company,
            $contact->email,
            $contact->phone,
            $contact->schokolade,
            !is_null($contact->interest) ? implode(', ', unserialize($contact->interest)) : null,
            implode(', ', $contact->files->pluck('name')->toArray()),
            $contact->message
        ];
    }

    /**
     * @return string[]
     */
    public function headings() : array
    {
        return [
            'Count',
            'Vorname',
            'Name',
            'Firma',
            'Email',
            'Telefon',
            'Lieblingsschokolade',
            'Interesse',
            'Files',
            'Mitteilung',
        ];
    }
}
