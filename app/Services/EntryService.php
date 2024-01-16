<?php
namespace App\Services;

use App\Models\Entry;

class EntryService 
{
    public function createEntry($userId, $eventId, $gateId)
    {
        Entry::create([
            'user_id' => $userId,
            'event_id' => $eventId,
            'gate_id' => $gateId,
            'data_ora' => now(),
        ]);
    }
}