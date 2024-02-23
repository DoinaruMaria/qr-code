<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\GenerateTicketController;
use App\Http\Controllers\NotAdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\EvenimenteController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\MyTicketsController;
use App\Http\Controllers\CalendarController;
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

// display events in homepage without being logged in
Route::get('/',[EvenimenteController::class, 'showEvents'] )->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [profileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [profileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// display events in home 
// Route::get('/acasa', [EvenimenteController::class, 'showEventsHome'])->middleware(['auth', 'verified'])->name('acasa');

//display closed events 
Route::get('/evenimente-incheiate', [EvenimenteController::class, 'showClosedEvents'])->name('closed-events')  ;

// display event's infos
Route::get('/evenimente/{slug}', [EvenimenteController::class, 'index']);

// generates ticket and display qr code
Route::get('/generate-ticket/{slug}', [GenerateTicketController::class, 'index']);

// display tickets details if the user is admin
Route::get('/bilete/validare/{userId}/{eventId}', [ValidateController::class, 'validateAdmin'])->middleware(EnsureUserIsAdmin::class);

// display message if the user is not admin
Route::get('/not-admin', [NotAdminController::class, 'index']) ->name('notAdmin');

//display list of generated tickets
Route::get('/biletele-mele', [MyTicketsController::class, 'myTickets'])->name('my-tickets');

// Adauga in calendar evenimentul
Route::get('/download-ics/{eventId}', [CalendarController::class, 'downloadICS'])->name('download.ics');

