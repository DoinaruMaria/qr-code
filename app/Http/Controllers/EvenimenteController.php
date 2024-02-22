<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EvenimenteController extends Controller 
{
   
   public function index($slug)
{
    $event = Event::where('slug', $slug)->first();

    if ($event) {
        return view('evenimente', ['event' => $event]);
    }

    return view('not-event');
}

     public function showEvents(){
        $currentDate = now()->toDateString();
        $events = DB::table('events')
            ->orderByRaw("CASE 
                WHEN start_date = '{$currentDate}' THEN 0
                WHEN start_date > '{$currentDate}' THEN 1
                ELSE 2
                END")
            ->orderBy('start_date', 'ASC')
            ->get();
        $noOfPaginacionData = 20;
        $events=Event::paginate($noOfPaginacionData);

        return view('welcome', ['events' => $events]);
    }

    public function showClosedEvents(){
        $currentDate= now()->toDateString();
        $events = DB::table('events')
            ->where('end_date', '>', '{$currentDate}')
            ->orderBy('end_date', 'DESC')
            ->get();
    
        return view('/evenimente-incheiate', ['events' => $events]);
    }
}