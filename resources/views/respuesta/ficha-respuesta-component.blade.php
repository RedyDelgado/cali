<div>
        <div class="card has-table mb-3">
     <header class="card-header bg-gray-300">
        <p class="card-header-title">
          Ficha de identificacion sin ficha de respuestas
        </p>
      </header>    
		@if($datos->count())

      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>Grupo</th>
            <th>Orden</th>
            <th>Infentificacion</th>
            <th>Postulante</th>
          </tr>
          </thead>
          <tbody>
		 @foreach($datos as $dato)
          <tr>
            <td>
              <small class="text-gray-500">{{ $dato->grupo }}</small>
            </td>
            <td>
               <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">{{ $dato->orden }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $dato->identificacion }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $dato->alumno }}</small>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
      </div>
		{{ $datos->links()}}
		  @else
          <div class="flex items-center justify-between px-4">
            <small>No hay fichas de identificacion que no tengan un par de ficha de respuesta.</small>
          </div>
          @endif
      </div>


     <div class="card has-table mb-3">
     <header class="card-header bg-gray-300">
        <p class="card-header-title">
          Ficha de respuesta sin ficha de identificacion
        </p>
      </header>    
		@if($datos2->count())

      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>Ciclo/Modalidad/Examen/Grupo</th>
            <th>Orden</th>
            <th>Infentificacion</th>
            <th>Tema/Repuestas</th>
          </tr>
          </thead>
          <tbody>
		 @foreach($datos2 as $dato)
          <tr>
            <td>
              <small class="text-gray-500">{{ $dato->ciclo }}/{{ $dato->modalidad }}/{{ $dato->examen }}/{{ $dato->grupo }}</small>
            </td>
            <td>
              <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">{{ $dato->orden }}</span>  
            </td>
            <td>
              <small class="text-red-500 font-semibold">{{ $dato->identificacion }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $dato->tema }} / {{ $dato->respuestas }}</small>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
      </div>
		{{ $datos2->links()}}
		  @else
          <div class="flex items-center justify-between px-4">
            <small>No hay fichas de respuesta que no tenga ficha de indentificacion.</small>
          </div>
          @endif
      </div>
</div>
