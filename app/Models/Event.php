<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'nume',
        'data',
        'excert',
        'descriere',
        'locatie',
        'logo',
        'cover',
        'thumbnail',
        'porti_acces',
        'editie',
        'culoare_primara',
        'culoare_secundara',
    ];
}
