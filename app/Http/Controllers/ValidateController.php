<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

class ValidateController extends Controller 
{ 

    public function validateAdmin(string $userId, string $eventId){
        // find ticket 
        $isTicket = Ticket::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if($isTicket){
           return view('bilete/validare', ['isTicket' => $isTicket]);
        } 
       return view('notTicket');
    }

}