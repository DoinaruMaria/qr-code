<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EvenimenteController extends Controller 
{
   
    public function index($id)
    {
        $events = Event::all();
        
        $event = Event::find($id);

        if($event){
            return view('evenimente', ['event'=> $event]);
        }
        return view('notEvent');
    }

  

}