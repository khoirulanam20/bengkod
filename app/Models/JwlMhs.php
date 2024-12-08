<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JwlMhs extends Model
{
    protected $table = 'jwl_mhs';
    
    protected $fillable = [
        'mhs_id',
        'matakuliah',
        'sks',
        'kelp',
        'ruangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(InputMhs::class, 'mhs_id');
    }
}