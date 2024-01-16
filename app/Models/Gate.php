<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoartaAcces extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id_event', 
        'name',
    ];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'gate_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'gate_id');

    }
}
