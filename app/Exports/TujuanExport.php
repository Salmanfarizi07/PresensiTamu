<?php

namespace App\Exports;

use App\Models\Tujuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TujuanExport implements FromCollection, WithHeadings
{
    protected $unit;

    public function __construct($unit = null)
    {
        $this->unit = $unit;
    }

    public function collection()
    {
        $query = Tujuan::select('unit', 'nama');

        if ($this->unit) {
            $query->where('unit', $this->unit);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return ['Unit', 'Nama'];
    }
}

