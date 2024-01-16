<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class MyTicketsController extends Controller
{
    public function myTickets()
    {
        $userId = Auth::id();

        // Folosește Eloquent pentru a obține biletele utilizatorului și asocierea automată cu evenimentele
        $myTickets = Ticket::where('user_id', $userId)
            ->with('event') // Eager loading pentru a încărca evenimentul asociat cu fiecare bilet
            ->get();

        return view('biletele-mele', ['myTickets' => $myTickets]);
    }
}