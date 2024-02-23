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
        $ticket = Ticket::with('user') // Presupunând că există o relație 'user' în modelul Ticket
            ->where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if ($ticket) {
            $ticket->gate_id = $user->gate_id;
            $ticket->scanned_at = now();
            $ticket->scan_count += 1;
            $entryId = $this->entryService->createEntry($user->id, $eventId, $user->gate_id, $ticket->id);
            $ticket->update();
        
            return view('bilete/validare', ['isTicket' => $ticket]);
        } 
        return view('not-ticket');
    }
}