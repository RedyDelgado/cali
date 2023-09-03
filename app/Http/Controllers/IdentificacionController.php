<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdentificacionController extends Controller
{
    public function index(Request $request)
    {
      return view('identificacion.index');
    }
}
