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
    public function index($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $event = Event::find($id);

            if ($event) {
                $generateDate = now();

                // Caută biletul existent
                $existingTicket = Ticket::where('user_id', $userId)
                    ->where('event_id', $event->id)
                    ->first();

                if ($existingTicket) {
                    $existingTicket->update(['purchase_date' => $generateDate]);

                    // Actualizează idBilet în Users db
                    $user = User::find($userId);
                    $user->ticket_id = strval($existingTicket->id);
                    $user->save();

                    return view('generate-ticket', ['existingTicket' => $existingTicket, 'event' => $event]);
                } else {
                    // Creează și salvează un nou bilet în Tickets db
                    $ticket = new Ticket();
                    $ticket->user_id = $userId;
                    $ticket->event_id = $event->id;
                    $ticket->purchase_date = $generateDate;
                    $ticket->entry_location = '';
                    $ticket->save();

                    // Actualizează idBilet în Users db
                    $user = User::find($userId);
                    $user->idBilet = strval($ticket->id);
                    $user->save();

                    return view('generate-ticket', ['existingTicket' => $ticket, 'event' => $event]);
                }
            }

            return view('not-event');
        }

        return view('not-ticket');
    }
}
           