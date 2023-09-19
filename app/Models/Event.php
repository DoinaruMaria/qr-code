<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenimente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nume',
        'data',
        'descriere',
        'locatie',
        'logo',
        'cover',
        'porti_acces',
        'editie',
    ];
}
