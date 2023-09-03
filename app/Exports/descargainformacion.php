<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class descargainformacion implements FromView
{
	protected $identificacion;
	protected $ciclo;
	protected $examen;
	protected $grupo;
	protected $tema;
	protected $modalidad;

	function __construct($ciclo,$examen,$identificacion,$grupo,$tema,$modalidad) {
		$this->ciclo = $ciclo;
		$this->examen = $examen;
		$this->identificacion = $identificacion;
		$this->grupo =$grupo;
		$this->tema =$tema;
		$this->modalidad =$modalidad;
	}

	public function view(): View
	{
		return view('exports.datospostulante',[

			'datos' => DB::table('Ex_Alumno')
			->select('Ex_AlumnoExamen.ciclo','Ex_AlumnoExamen.examen','Ex_Alumno.alumno','nombre','carrera','Ex_Identificacion.grupo','Ex_Identificacion.orden','Ex_Identificacion.identificacion','Ex_Respuesta.orden as orden_respuestas','Ex_Respuesta.identificacion as identificacion_respuestas', 'Ex_Respuesta.tema','respuestas','Ex_AlumnoExamen.modalidad')

			->join('Ex_AlumnoExamen', function($join){
				$join->on('Ex_Alumno.alumno','=','Ex_AlumnoExamen.alumno');
				$join->on('Ex_Alumno.ciclo','=','Ex_AlumnoExamen.ciclo');
				$join->on('Ex_Alumno.modalidad','=','Ex_AlumnoExamen.modalidad');
				$join->on('Ex_Alumno.estado','=','Ex_AlumnoExamen.estado');
				$join->where('Ex_AlumnoExamen.ciclo',$this->ciclo );
				$join->where('Ex_AlumnoExamen.examen',$this->examen );
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

			->where('Ex_AlumnoExamen.ciclo',$this->ciclo)
			->where('Ex_AlumnoExamen.examen',$this->examen)
			->where('Ex_Respuesta.identificacion',$this->identificacion)
			->get()

		, 'soluciones' => DB::table('Ex_Tema')
			->where('Ex_Tema.ciclo',$this->ciclo)
			->where('Ex_Tema.examen',$this->examen)
			->where('Ex_Tema.modalidad',$this->modalidad)
			->where('Ex_Tema.grupo',$this->grupo)
			->where('Ex_Tema.tema',$this->tema)
			->get()

		, 'conf_examen' => DB::table('Ex_ConfiguracionGrupoExamen')
			->where('Ex_ConfiguracionGrupoExamen.ciclo',$this->ciclo)
			->where('Ex_ConfiguracionGrupoExamen.examen',$this->examen)
			->where('Ex_ConfiguracionGrupoExamen.modalidad',$this->modalidad)
			->where('Ex_ConfiguracionGrupoExamen.grupo',$this->grupo)
			->get()

		//solo si es un examen, conc ada pregunta con un valor diferente
		, 'conf_examen_asig' => DB::table('Ex_AsignaturaGrupo')
			->where('Ex_AsignaturaGrupo.ciclo',$this->ciclo)
			->where('Ex_AsignaturaGrupo.examen',$this->examen)
			->where('Ex_AsignaturaGrupo.modalidad',$this->modalidad)
			->where('Ex_AsignaturaGrupo.grupo',$this->grupo)
			->orderBy('inicio', 'asc')
			->get()

		, 'nro_preguntas' => DB::table('Ex_ConfiguracionGrupoExamen')
							->select('longitudRespuesta')
							->where('Ex_ConfiguracionGrupoExamen.ciclo',$this->ciclo)
							->where('Ex_ConfiguracionGrupoExamen.examen',$this->examen)
							->where('Ex_ConfiguracionGrupoExamen.modalidad',$this->modalidad)
							->where('Ex_ConfiguracionGrupoExamen.grupo',$this->grupo)
							->first()


	]);

	}

}


