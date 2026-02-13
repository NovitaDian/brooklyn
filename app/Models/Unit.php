<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'nama',
        'luas_tanah',
        'luas_bangunan',
        'listrik',
        'air',
        'lantai',
        'atap',
        'dinding',
        'plafon',
        'kusen',
        'sanitary',
        'pintu',
        'jendela',
        'kt',
        'km',
        'foto',
        'denah',
        'detail1',
        'detail2',
        'detail3',
        'detail4',
        'detail5',
        'detail6',
    ];
}
