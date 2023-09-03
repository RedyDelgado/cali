<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class TarjetasComponent extends Component
{
    public function render()
    {
        $ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
        $examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();

        $Nropresente = DB::table('Ex_CalificacionAlumno')
                    ->where('np','=','0')
                    ->where('ciclo',$ciclo->valor )
                    ->where('examen',$examen->valor )
                    ->count();

        $NroRegistrados = DB::table('Ex_Alumno')
                    ->select('Ex_Alumno.alumno')
                    ->join('Ex_AlumnoExamen', function($join){
                        $ciclo = DB::table('Ex_Configuracion')->select('valor')->first();
                        $examen = DB::table('Ex_Configuracion')->orderby('valor','ASC')->first();
                            $join->on('Ex_Alumno.alumno','=','Ex_AlumnoExamen.alumno');
                            $join->on('Ex_Alumno.ciclo','=','Ex_AlumnoExamen.ciclo');
                            $join->on('Ex_Alumno.modalidad','=','Ex_AlumnoExamen.modalidad');
                            $join->on('Ex_Alumno.estado','=','Ex_AlumnoExamen.estado');
                            $join->where('Ex_AlumnoExamen.ciclo',$ciclo->valor );
                            $join->where('Ex_AlumnoExamen.examen',$examen->valor );
                        })
                    ->count();

    
        $NroNOpresente = DB::table('Ex_CalificacionAlumno')
 					->where('np','=','1')
 					->where('ciclo',$ciclo->valor )
 					->where('examen',$examen->valor )
 					->count();

         $FichaIdentificacion = DB::table('Ex_Identificacion')
                    ->where('ciclo',$ciclo->valor )
                    ->where('examen',$examen->valor )
                    ->count();

         $FichaRespuesta = DB::table('Ex_Respuesta')
                    ->where('ciclo',$ciclo->valor )
                    ->where('examen',$examen->valor )
                    ->count();

        return view('panelcontrol.tarjetas-component', compact('Nropresente','NroRegistrados','NroNOpresente','FichaIdentificacion','FichaRespuesta'));
    }
}
