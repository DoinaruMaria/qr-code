<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_eveniment',
        'data_inregistrare',
        'lista_de_intrari'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}