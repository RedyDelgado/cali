<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
      return view('alumno.index');
    }
}
