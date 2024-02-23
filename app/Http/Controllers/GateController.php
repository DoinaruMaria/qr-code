<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GateController extends Controller
{
    public function getGatesByEvent($eventId)
    {
        $gates = Gate::where('id_event', $eventId)->get();
        return response()->json($gates);
    }

     /**
     * Update gate_id for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateGate($gateId)
    {
        $user = Auth::user();
        $user->gate_id = $gateId;
        $user->save();
    }
}
