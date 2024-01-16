<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
        public function create(Request $request)
    {
        // Validați datele primite în request
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'gate_id' => 'required',
            // Alte reguli de validare dacă este necesar
        ]);

        // Creează o nouă intrare în tabela 'entries'
        $entry = Entry::create([
            'user_id' => $request->input('user_id'),
            'event_id' => $request->input('event_id'),
            'gate_id' => $request->input('gate_id'),
            'data_ora' => now(), // Adaugă data și ora curente
        ]);
    }
    public function index()
    {
        // Obțineți toate înregistrările din tabela 'entries'
        $entries = Entry::all();

        return view('entries.index', compact('entries'));
    }

    public function show($id)
    {
        // Obțineți o anumită înregistrare din tabela 'entries' după id
        $entry = Entry::findOrFail($id);

        return view('entries.show', compact('entry'));
    }

    // Alte funcții pentru creare, actualizare și ștergere (create, update, delete) pot fi adăugate aici
}