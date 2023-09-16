<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DropdownController;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use App\Models\Judet;
use Illuminate\View\View;
  
class DropdownController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        $data['judete'] = Country::get(["name", "id"]);
        return view('dropdown', $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
}