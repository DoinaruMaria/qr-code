<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

class ValidateController extends Controller 
{ 

    public function validateAdmin(string $userId, string $eventId){
        // find ticket 
        $isTicket = Ticket::where('id_user', $userId)
            ->where('id_eveniment', $eventId)
            ->first();

        if($isTicket){
           return view('bilete/validare', ['isTicket' => $isTicket]);
        } 
       return view('notTicket');
    }

}