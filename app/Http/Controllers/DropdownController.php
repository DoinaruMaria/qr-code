<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DropdownController;

use Illuminate\Foundation\Validation\ValidatesRequests;

Route::get('dropdown', [DropdownController::class, 'index']);
