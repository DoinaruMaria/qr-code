<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmMailController extends Controller
{
    public function showConfirmMail()
{
    return view('confirm-mail');
}

}