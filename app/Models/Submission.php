<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'alamat',
    'keperluan',
    'identitas',
    'daerah',
    'nokartu',
    'nopol',
    'status'
];
}
