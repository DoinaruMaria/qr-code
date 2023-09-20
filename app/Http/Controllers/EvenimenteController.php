<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Event;
use Illuminate\Support\Facades\View;

class EvenimenteController extends Controller 
{

    public function index(Request $request)
    {
        $event = Event::find(1);

        return view('first', [
            'event' => $event
        ]);
    }

}