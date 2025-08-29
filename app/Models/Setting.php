<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Nama tabel kalau berbeda dari default bisa didefinisikan:
    // protected $table = 'settings';

    protected $fillable = ['key', 'value'];
}
