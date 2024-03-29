<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Gate;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
   public function index()
    {
        $events = Event::all();
        $gates = Gate::all();

        $user = Auth::user();

        $gateName = null;
        $eventName = null;

        if ($user && $user->gate && $user->gate->event) {
            $gateName = $user->gate->name;
            $eventName = $user->gate->event->name;
        } else {
            // Tratarea cazului în care nu există o poartă sau un eveniment asociat
            $gateName = null;
            $eventName = null;
        }

        return view('admin.panou-de-control', compact('events', 'gates', 'gateName', 'eventName'));
    }

}
