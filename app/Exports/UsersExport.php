<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::limit(20)->get();
    }

    public function startCell() {}

    public function properties(): array
    {
        return [
            'creator'        => 'Patrick Brouwers',
            'lastModifiedBy' => 'Patrick Brouwers',
            'title'          => 'Invoices Export',
            'description'    => 'Latest Invoices',
            'subject'        => 'Invoices',
            'keywords'       => 'invoices,export,spreadsheet',
            'category'       => 'Invoices',
            'manager'        => 'Patrick Brouwers',
            'company'        => 'Maatwebsite',
        ];
    }
}
