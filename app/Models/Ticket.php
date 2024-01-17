<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'event_id',
        'purchase_date',
        'enties',
        'scanned_at',
        'gate_id',
        'scan_count',
        'entries',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gate()
    {
        return $this->belongsTo(Gate::class, 'gate_id');
    }
}