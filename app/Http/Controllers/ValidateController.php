<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\EntryService;
use Carbon\Carbon;

class ValidateController extends Controller 
{ 
    protected $entryService;

    public function __construct(EntryService $entryService)
    {
        $this->entryService = $entryService;
    }

    public function validateAdmin(string $userId, string $eventId)
    {
        $user = auth()->user();

        // Găsiți biletul
        $ticket = Ticket::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->first();

        if ($ticket) {
            // Actualizați câmpurile pentru bilet
            $ticket->gate_id = $user->gate_id;
            $ticket->scanned_at = now();
            $ticket->scan_count += 1;
            $ticket->update();

            // Adăugați o nouă intrare utilizând serviciul
            $this->entryService->createEntry($user->id, $eventId, $user->gate_id);

            return view('bilete/validare', ['isTicket' => $ticket]);
        }

        return view('not-ticket');
    }
}