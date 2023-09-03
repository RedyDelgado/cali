<?php

namespace App\Http\Livewire;
use LivewireUI\Modal\ModalComponent;
use DB;

class CorregirIdentificacionComponent extends ModalComponent
{
    public $ciclo, $modalidad, $examen, $alumno;
    public $dni;
    public function render()
    {
        return view('identificacion.corregir-identificacion-component');
    }
    protected $rules = [
        'dni' => 'required',
    ];
    public function update()
    {
        $this->validate([
            'dni' => 'required',
        ]);

        $verificar = DB::table('Ex_Alumno')->where('alumno', $this->dni)->get();

        if(COUNT($verificar) !=0){

        $actualizar = DB::table('Ex_Identificacion')
            ->where('ciclo', $this->ciclo)
            ->where('modalidad', $this->modalidad)
            ->where('examen', $this->examen)
            ->where('alumno', $this->alumno)
            ->update(['alumno' => $this->dni]);

            
        $grupo = DB::table('Ex_Alumno')
                ->join('Ex_CarreraModalidad', function($join)
                {
                    $join->on('Ex_Alumno.ciclo','=','Ex_CarreraModalidad.ciclo');
                    $join->on('Ex_Alumno.modalidad','=','Ex_CarreraModalidad.modalidad');
                    $join->on('Ex_Alumno.carrera','=','Ex_CarreraModalidad.carrera');
                })
                ->where('Ex_Alumno.alumno','=',$this->dni)
                ->select('grupo')
                ->first();

        $actualizar_grupo = DB::table('Ex_Identificacion')
            ->where('ciclo', $this->ciclo)
            ->where('modalidad', $this->modalidad)
            ->where('examen', $this->examen)
            ->where('alumno', $this->dni)
            ->update(['grupo' => $grupo->grupo]);

        $datos_iden = DB::table('Ex_Identificacion')
            ->where('ciclo', $this->ciclo)
            ->where('modalidad', $this->modalidad)
            ->where('examen', $this->examen)
            ->where('alumno', $this->dni)
            ->select('identificacion', 'orden')
            ->first();

        $act_ficha_iden = DB::table('Ex_CalificacionAlumno')
            ->where('ciclo', $this->ciclo)
            ->where('modalidad', $this->modalidad)
            ->where('examen', $this->examen)
            ->where('alumno', $this->dni)
            ->update(['identificacion' => $datos_iden->identificacion, 'identpos' =>$datos_iden->orden]);

        $this->emit('alert','success','DNI y ficha de identificación actualizado correctamente.');
        $this->closeModalWithEvents([
            FichaIdentificacionComponent::getName() => 'renderEvent']);
        }
        else{
            $this->emit('alert','warning','DNI no encontrado.');
            $this->closeModalWithEvents([
            FichaIdentificacionComponent::getName() => 'renderEvent']);
        }
    }
}
