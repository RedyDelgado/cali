<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\descargainformacion;

class DescargarController extends Controller
{
       public function exportexcel($ciclo,$examen,$identificacion,$grupo,$tema,$modalidad)
       {
       return Excel::download(new descargainformacion($ciclo,$examen,$identificacion,$grupo,$tema,$modalidad),
              'descarga_calificacion.xlsx');
       }
}
