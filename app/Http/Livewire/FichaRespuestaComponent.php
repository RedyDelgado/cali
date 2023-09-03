<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class FichaRespuestaComponent extends Component
{
	use WithPagination;
	public function render()
	{

		$ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
		$examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();

		return view('respuesta.ficha-respuesta-component', [

			'datos' => DB::table('Ex_Identificacion')
 					->where('ciclo',$ciclo->valor )
 					->whereNotIn('identificacion', function($query){
						$ciclovalor = DB::table('Ex_Configuracion')->select('valor')->first();
 						$query->select('identificacion')->from('Ex_Respuesta')->where('ciclo','=',$ciclovalor->valor)->get();
 					})
            		->paginate(5),
					
			'datos2' => DB::table('Ex_Respuesta')
 					->where('ciclo',$ciclo->valor )
 					->whereNotIn('identificacion', function($query){
						$ciclovalor = DB::table('Ex_Configuracion')->select('valor')->first();
 						$query->select('identificacion')->from('Ex_Identificacion')->where('ciclo','=',$ciclovalor->valor)->get();
 					})
            		->paginate(5)

		]);
	}
}