<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelControlController extends Controller
{
    public function index(Request $request)
    {
      return view('index');
    }
}
