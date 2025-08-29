<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zones';
    protected $primaryKey = 'nomor';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nomor', 'id_kartu', 'zona'];

    // Accessor untuk menampilkan nomor dengan prefix 00
    public function getNomorFormattedAttribute()
    {
        return '00' . $this->nomor;
    }
    
}
