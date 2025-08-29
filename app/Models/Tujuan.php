<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Submissions;


class Tujuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'nama',
        'jabatan',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    

}