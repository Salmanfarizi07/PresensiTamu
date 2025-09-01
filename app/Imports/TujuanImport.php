<?php

namespace App\Imports;

use App\Models\Tujuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TujuanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // normalisasi value
        $unit = strtoupper(trim($row['unit']));

        // validasi manual biar aman
        if (!in_array($unit, ['UPT','UP2B'])) {
            return null; // skip baris yang salah
        }

        return new Tujuan([
            'unit' => $unit,
            'nama' => trim($row['nama']),
        ]);
    }
}

