<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class CicloComponent extends Component
{
     public function render()
    {
       $ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
       $examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();
        return view('ciclo-component', [
 			'ciclo' => $ciclo->valor,
 			'examen'=> $examen->valor

        ]);
    }
}
