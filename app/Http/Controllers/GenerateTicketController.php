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

    public function index($id){
        if (Auth::check()) {
            //create ticket
            $userId = Auth::id(); // current user id
            $eventsUPB = Event::find($id);

            if($eventsUPB){
                $eventId = $eventsUPB->id;    
                $generateDate = now();

                $collection = collect(['id_user', 'id_eveniment', 'data_generare_bilet']);
                $combined = $collection->combine([$userId, $eventId, $generateDate]);
                $combined->all();

                //find ticket 
                $existingTicket = Ticket::where('id_user', $userId)
                ->where('id_eveniment', $eventId)
                ->first();
            
                if ($existingTicket) { 
                    $existingTicket->save();
                    $ticketId = $existingTicket->id;

                    //add ticketId in Users db
                    $user = User::find($userId);
                    $user->idBilet = strval($ticketId);
                    $user->save();
 
                    return view('generateTicket', ['existingTicket' => $existingTicket]);
                } else {
                    //create new ticket and save it Tickets db
                    $ticket = new Ticket();
                    $ticket->id_user = $userId;
                    $ticket->id_eveniment = $eventId;
                    $ticket->data_inregistrare = $generateDate;
                    $ticket->lista_de_intrari = '';
                    $ticket->save();
    
                    $ticketId = $ticket->id;
    
                    //add ticketId in Users db
                    $user = User::find($userId);
                    $user->idBilet = strval($ticketId);
                    $user->save();
    
                    return view('generateTicket', ['existingTicket' => $ticket]);
                }
            }
            return view('notEvent');
        } 
        return view('notTicket');
    }
}
           