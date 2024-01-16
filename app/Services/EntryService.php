<?php
namespace App\Services;

use App\Models\Entry;

class EntryService 
{
public function createEntry($userId, $eventId, $gateId, $ticketId)
{
    $entry = Entry::create([
        'user_id' => $userId,
        'event_id' => $eventId,
        'gate_id' => $gateId,
        'ticket_id' => $ticketId,
        'data_ora' => now(),
    ]);

    return $entry->id;
}
}