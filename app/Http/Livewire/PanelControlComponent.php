<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Livewire\WithPagination;


class PanelControlComponent extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    { 
        return view('panelcontrol.panel-control-component', [
            'users' => DB::table('Ex_Alumno')
            ->select('Ex_AlumnoExamen.ciclo','Ex_AlumnoExamen.examen','Ex_Alumno.alumno','nombre','carrera','Ex_Identificacion.grupo','Ex_Identificacion.orden','Ex_Identificacion.identificacion','Ex_Respuesta.orden
            as orden_respuestas','Ex_Respuesta.identificacion as identificacion_respuestas','respuestas',
            'Ex_Respuesta.tema','Ex_AlumnoExamen.modalidad')

            ->join('Ex_AlumnoExamen', function($join){
            $ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
            $examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();
            $join->on('Ex_Alumno.alumno','=','Ex_AlumnoExamen.alumno');
            $join->on('Ex_Alumno.ciclo','=','Ex_AlumnoExamen.ciclo');
            $join->on('Ex_Alumno.modalidad','=','Ex_AlumnoExamen.modalidad');
            $join->on('Ex_Alumno.estado','=','Ex_AlumnoExamen.estado');
            $join->where('Ex_AlumnoExamen.ciclo','=',$ciclo->valor );
            $join->where('Ex_AlumnoExamen.examen',$examen->valor );
            })

            ->join('Ex_Identificacion', function($join){
            $join->on('Ex_AlumnoExamen.alumno','=','Ex_Identificacion.alumno');
            $join->on('Ex_AlumnoExamen.ciclo','=','Ex_Identificacion.ciclo');
            $join->on('Ex_AlumnoExamen.examen','=','Ex_Identificacion.examen');
            $join->on('Ex_Alumno.ciclo','=','Ex_Identificacion.ciclo');
            $join->on('Ex_Alumno.alumno','=','Ex_Identificacion.alumno');
            $join->on('Ex_Alumno.modalidad','=','Ex_Identificacion.modalidad');
            })

            ->join('Ex_Respuesta', function($join){
            $join->on('Ex_Identificacion.ciclo','=','Ex_Respuesta.ciclo');
            $join->on('Ex_Identificacion.modalidad','=','Ex_Respuesta.modalidad');
            $join->on('Ex_Identificacion.examen','=','Ex_Respuesta.examen');
            $join->on('Ex_Identificacion.grupo','=','Ex_Respuesta.grupo');
            $join->on('Ex_Identificacion.identificacion','=','Ex_Respuesta.identificacion');
            })

            ->orWhere('Ex_Alumno.dni','LIKE', "%{$this->search}%" )
            ->orWhere('Ex_Alumno.nombre','LIKE', "%{$this->search}%" )
            ->orWhere('Ex_Identificacion.orden','LIKE', "%{$this->search}%" )
            ->orWhere('Ex_Identificacion.identificacion','LIKE', "%{$this->search}%" )
            ->orWhere('Ex_Respuesta.orden','LIKE', "%{$this->search}%" )
            ->orWhere('Ex_Respuesta.identificacion','LIKE', "%{$this->search}%" )
            ->paginate(10)
        ]);
    }
}
