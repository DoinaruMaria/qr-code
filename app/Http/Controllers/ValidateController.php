<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Carbon\Carbon;

class ValidateController extends Controller 
{ 

    public function validateAdmin(string $userId, string $eventId){
        // find ticket 
        $isTicket = Ticket::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

<<<<<<< HEAD
        if ($ticket) {
            // Actualizați câmpul scanned_at
            $ticket['gate_id'] = $user['gate_id'];
            $ticket['scanned_at'] = now();
            $ticket['scan_count'] =  $ticket['scan_count'] + 1;
            $ticket->update();

            return view('bilete/validare', ['isTicket' => $ticket]);
        }

    return view('not-ticket');
}
=======
        if($isTicket){
           return view('bilete/validare', ['isTicket' => $isTicket]);
        } 
       return view('not-ticket');
    }
>>>>>>> main

}