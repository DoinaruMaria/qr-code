<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $judete = [ "AB" => "Alba", "AR" => "Arad", "AG" => "Argeş", "BC" => "Bacău", "BH" => "Bihor", "BN" => "Bistriţa-Năsăud", "BT" => "Botoşani", "BR" => "Brăila", "BV" => "Braşov", "B" => "Bucureşti", "BZ" => "Buzău", "CL" => "Călăraşi", "CS" => "Caraş-Severin", "CJ" => "Cluj", "CT" => "Constanţa", "CV" => "Covasna", "DB" => "Dâmboviţa", "DJ" => "Dolj", "GL" => "Galaţi", "GR" => "Giurgiu", "GJ" => "Gorj", "HR" => "Harghita", "HD" => "Hunedoara", "IL" => "Ialomiţa", "IS" => "Iaşi", "IF" => "Ilfov", "MM" => "Maramureş", "MH" => "Mehedinţi", "MS" => "Mureş", "NT" => "Neamţ", "OT" => "Olt", "PH" => "Prahova", "SJ" => "Sălaj", "SM" => "Satu Mare", "SB" => "Sibiu", "SV" => "Suceava", "TR" => "Teleorman", "TM" => "Timiş", "TL" => "Tulcea", "VL" => "Vâlcea", "VS" => "Vaslui", "VN" => "Vrancea"];
        return view('auth.register', ['judete' => $judete]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nume' => ['required', 'string', 'max:255'],
            'prenume' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'telefon' => ['required', 'regex:/^\d{10}$/'],
            'tip' => ['required', 'string'],
            'judet' => ['required', 'string'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nume' => $request->nume,
            'prenume' => $request->prenume,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'tip' => $request->tip,
            'judet' => $request->judet,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
