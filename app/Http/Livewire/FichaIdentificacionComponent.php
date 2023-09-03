<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class FichaIdentificacionComponent extends Component
{
    use WithPagination;
    public function render()
    {
    	
		$ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
        return view('identificacion.ficha-identificacion-component', [
            'post_sin_f_iden' => DB::table('Ex_Alumno')
								->join('Ex_AlumnoExamen', function($join2){
									$join2->on('Ex_Alumno.alumno','=','Ex_AlumnoExamen.alumno');
									$join2->on('Ex_Alumno.ciclo','=','Ex_AlumnoExamen.ciclo');
									$join2->on('Ex_Alumno.modalidad','=','Ex_AlumnoExamen.modalidad');
								})					
								->where('Ex_Alumno.ciclo','=',$ciclo->valor)
								->whereNotIn('Ex_Alumno.alumno', function($query){
									$ciclos = DB::table('Ex_Configuracion')->select('valor')->first();
									$query->select('alumno')->from('Ex_Identificacion')->where('Ex_Identificacion.ciclo','=',$ciclos->valor)->get();
								})
								->paginate(10),
								
								'f_iden_sin_pos' => DB::table('Ex_Identificacion')
									->where('ciclo','=',$ciclo->valor)
									->whereNotIn('alumno', function($query){
										$ciclos = DB::table('Ex_Configuracion')->select('valor')->first();
										$query->select('alumno')->from('Ex_Alumno')->where('Ex_Alumno.ciclo','=',$ciclos->valor)->get();
									})
									->paginate(10)
								]);
    }
    public $listeners = [
    	'renderEvent' => 'render',
    ];
}
