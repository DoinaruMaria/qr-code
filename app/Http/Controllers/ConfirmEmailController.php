<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmEmailController extends Controller
{
    public function showConfirmEmail()
{
    return view('confirm-email');
}

}