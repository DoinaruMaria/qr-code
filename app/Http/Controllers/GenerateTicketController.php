<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class GenerateTicketController extends Controller
{
   public function index($slug)
{
    if (Auth::check()) {
        $userId = Auth::id();
        
        $event = Event::where('slug', $slug)->first();

        if ($event) {
            $generateDate = now();

            // Caută biletul existent
            $existingTicket = Ticket::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->first();

            if ($existingTicket) {
                $existingTicket->update(['purchase_date' => $generateDate]);

                // Presupun că actualizarea idBilet în Users db este necesară
                $user = User::find($userId);
                $user->save();

                return view('generare-bilet', [
                    'existingTicket' => $existingTicket,
                    'event' => $event,
                    'user_id' => $userId,
                    'event_id' => $event->id, 
                    ]);

            } else {
                // Creează și salvează un nou bilet
                $ticket = new Ticket();
                $ticket->user_id = $userId;
                $ticket->event_id = $event->id;
                $ticket->purchase_date = $generateDate;
                $ticket->save();

                // Actualizează idBilet în Users db
                $user = User::find($userId);
                $user->idBilet = strval($ticket->id);
                $user->save();

                return view('generare-bilet', [
                    'existingTicket' => $ticket, 
                    'event' => $event,
                    'user_id' => $userId,
                    'event_id' => $event->id, 
                    ]);
            }
        }

        return view('not-event');
    }
    return view('auth.login');
}

}