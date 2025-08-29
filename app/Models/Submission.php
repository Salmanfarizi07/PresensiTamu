<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Laporan;
use App\Models\Tujuan;
use App\Models\Zone;

class Submission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tujuan_id','name','alamat','jumlah','keperluan', 
        'identitas','daerah','nokartu','nopol','status','is_archived','archived_at'
    ];

    protected static function booted()
    {
        static::updated(function ($submission) {
            // Jika status berubah menjadi nonaktif & belum di-archive
            if ($submission->status === 'nonaktif' && !$submission->is_archived) {
                
                // Salin data ke Laporan
                Laporan::create($submission->only([
                    'name','alamat','jumlah','keperluan',  'tujuan_id', 'keluar',
                    'identitas','daerah','nokartu','nopol','status'
                ]));

                // Tandai sebagai archived
                $submission->update([
                    'is_archived' => true,
                    'archived_at' => now(),
                ]);
            }
        });
    }
    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'id_kartu'); 
    }



}
