<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class AlumnoComponent extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
		$ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
		$examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();



		return view('alumno.alumno-component', [
			'alumnos' => DB::table('Ex_Alumno')
                    ->join('Ex_AlumnoExamen', function($join){
                        $join->on('Ex_AlumnoExamen.alumno','=','Ex_Alumno.alumno');
                        $join->on('Ex_AlumnoExamen.ciclo','=','Ex_Alumno.ciclo');
                        $join->on('Ex_AlumnoExamen.modalidad','=','Ex_Alumno.modalidad');
                    })
           ->select('Ex_Alumno.alumno','Ex_Alumno.carrera','Ex_Alumno.modalidad','Ex_Alumno.nombre','Ex_AlumnoExamen.aula','Ex_AlumnoExamen.carpeta')
 		   ->where('Ex_AlumnoExamen.ciclo',$ciclo->valor)
 		   ->where('Ex_AlumnoExamen.examen',$examen->valor)
           ->where(function ($query) {
                    $query->orWhere('Ex_Alumno.alumno', 'LIKE', "%{$this->search}%")
                    ->orWhere('Ex_Alumno.nombre', 'LIKE', "%{$this->search}%");
           })
        //    ->orderBy('Ex_Alumno.alumno', 'Ex_Alumno.nombre', 'Ex_AlumnoExamen.aula','Ex_AlumnoExamen.carpeta')
           ->paginate(50)
		]);
    }
}