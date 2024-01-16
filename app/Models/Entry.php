<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'event_id', 
        'gate_id',
        'ticket_id',
        'data_ora'
    ];
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'entry_ticket');
    }
}
