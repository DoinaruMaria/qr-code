<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Carbon\Carbon;

class ValidateController extends Controller 
{ 

public function validateAdmin($eventId)
{
    $user = auth()->user();

    // Verificați dacă user-ul are un gate asociat

        // Găsiți biletul în funcție de user, eveniment și gate
        $ticket = Ticket::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->first();

        if ($ticket) {
            // Actualizați câmpul scanned_at
            $ticket['gate_id'] = $user['gate_id'];
            $ticket['scanned_at'] = now();
            $ticket['scan_count'] =  $ticket['scan_count'] + 1;
            $ticket->update();

            return view('bilete/validare', ['isTicket' => $ticket]);
        }

    return view('notTicket');
}

}