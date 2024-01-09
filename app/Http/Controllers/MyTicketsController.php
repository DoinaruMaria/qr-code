<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class MyTicketsController extends Controller
{
    public function myTickets(){

        $userId = Auth::id();


        // find tickets
        $myTickets = DB::table('tickets')
            ->join('events', 'id_eveniment', '=', 'events.id' )
            ->where('id_user', '=', $userId)
            ->select('tickets.*', 'events.nume')
            ->get();       

        return view('bileteleMele', ['myTickets' => $myTickets]);
    }


}
