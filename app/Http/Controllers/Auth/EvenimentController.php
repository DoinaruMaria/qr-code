<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Evenimente;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class EvenimenteController extends Controller{

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nume' => ['required', 'string', 'max:255'],
            'data' => ['required', 'date'],
            'descriere' => ['required', 'text'],
            'locatie' => ['required', 'string'],
            'logo' => ['required', 'string'],
            'cover' => ['required', 'string'], 
            'poarti_acces' => ['required', 'string'],
            'editie' => ['required', 'integer']
        ]);

        $eveniment = Evenimente::create([
            'nume' => $request->nume,
            'data' => $request->data,
            'descriere' => $request->descriere,
            'locatie' => $request->locatie,
            'logo' => $request->logo,
            'cover' => $request->cover,
            'porti_acces' => $request->porti_acces,
            'editie' => $request->editie
        ]);

    }
}
