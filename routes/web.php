<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenerateTicketController;
use App\Http\Controllers\NotAdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\EvenimenteController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\MyTicketsController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\User;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Http\Request;
use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// display events in dashboard 
Route::get('/dashboard', function (Request $request) {
    $currentDate = now()->toDateString();
    $events = DB::table('events')
        ->orderByRaw("CASE 
            WHEN data = '{$currentDate}' THEN 0
            WHEN data > '{$currentDate}' THEN 1
            ELSE 2
            END")
        ->orderBy('data', 'ASC')
        ->get();
    $noOfPaginacionData = 6;
    if($noOfPaginacionData == 6){
       \Log::info('This is some useful information.');
    }
    $events=Event::paginate($noOfPaginacionData);
    return view('/dashboard', ['events' => $events]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// display events
Route::get('/evenimenteCurente', function(){
    $currentDate= now()->toDateString();
    $events = DB::table('events')
        ->where('data', '=', '{$currentDate}')
        ->get();
    
    return view('/evenimenteCurente', ['events' => $events]);
    });

Route::get('/evenimenteViitoare', function(){
    $currentDate= now()->toDateString();
    $events = DB::table('events')
        ->where('data', '>', '{$currentDate}')
        ->orderBy('data', 'ASC')
        ->get();
    
    return view('/evenimenteViitoare', ['events' => $events]);
    });

Route::get('/evenimenteIncheiate', function(){
    $currentDate= now()->toDateString();
    $events = DB::table('events')
        ->where('data', '>', '{$currentDate}')
        ->orderBy('data', 'DESC')
        ->get();
    
    return view('/evenimenteIncheiate', ['events' => $events]);
    });

// display event's infos
Route::get('/evenimente/{id}', [EvenimenteController::class, 'index']);

// generates ticket and display qr code
Route::get('/generateTicket/{id}', [GenerateTicketController::class, 'index']);

// display tickets details if the user is admin
Route::get('/bilete/validare/{userId}/{eventId}', [ValidateController::class, 'validateAdmin'])->middleware(EnsureUserIsAdmin::class);

// display message if the user is not admin
Route::get('/notAdmin', [NotAdminController::class, 'index']) ->name('notAdmin');

//display list of generated tickets
Route::get('/bileteleMele', [MyTicketsController::class, 'myTickets'])->name('bileteleMele');

