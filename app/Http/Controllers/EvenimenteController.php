<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Event;

class EvenimenteController extends Controller 
{

public function index(){
    $events = DB::select('select * from events'); 

    $event = Event::show([
        'nume' => $events->nume,
        'data'=>$events->data,
        'descriere' => $events->descriere,
        'locatie' => $events->locatia,
        'logo'=>$events->logo,
        'cover'=>$events->cover,
        'porti_acces'=>$events->porti_acces,
        'editie'=>$events->editie,
    ]);

    return view('show_event', ['event'=>$event]);
    }

}