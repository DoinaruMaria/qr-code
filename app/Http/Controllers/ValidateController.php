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
        $gateId = $user->gate->id;

        // Găsiți biletul în funcție de user, eveniment și gate
        $isTicket = Ticket::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->where('gate_id', $gateId)
            ->first();

        if ($isTicket) {
            // Actualizați câmpul scanned_at
            $isTicket->update(['scanned_at' => now()]);

            return view('bilete/validare', ['isTicket' => $isTicket]);
        }

    return view('notTicket');
}

}