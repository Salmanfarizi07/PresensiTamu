<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Laporan::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat/Instansi',
            'Jumlah',
            'Waktu Masuk',
            'Waktu Keluar',
            'Keperluan',
            'Bukti Identitas',
            'No Kartu Zona',
            'Jenis Kendaraan',
            'No Kendaraan',
            'Tujuan Unit/PIC'
        ];
    }

    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->name,
            $laporan->alamat,
            $laporan->jumlah,
            $laporan->created_at ? $laporan->created_at->format('d-m-Y H:i') : null,
            $laporan->keluar,
            $laporan->keperluan,
            $laporan->identitas,
            $laporan->daerah,
            $laporan->nokartu,
            $laporan->nopol,
            $laporan->tujuan_id,
        ];
    }
}

