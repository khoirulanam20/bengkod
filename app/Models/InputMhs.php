<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputMhs extends Model
{
    protected $table = 'inputmhs';
    
    protected $fillable = [
        'namaMhs',
        'nim',
        'ipk',
        'sks',
        'matakuliah'
    ];
}