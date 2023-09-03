<div>
    <div class="card has-table mb-3">
     <header class="card-header bg-gray-300">
        <p class="card-header-title">
          Postulantes con DNI equivocado en la ficha de identificacion
        </p>
      </header>

      @if($post_sin_f_iden->count() )
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>Ciclo/Modalidad/Carrera</th>
            <th>Modalidad/Aula/Carpeta</th>
            <th>Alumno</th>
            <th>Nombre</th>
          </tr>
          </thead>
          <tbody>
	     @foreach($post_sin_f_iden as $postsinfiden)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm  text-gray-500">
												{{ $postsinfiden->ciclo }}/{{ $postsinfiden->modalidad }}/{{ $postsinfiden->carrera }}
											</div>
										</div>
									</div>
			</td>
            <td class="px-6 py-4 whitespace-nowrap">

									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm  text-gray-500">
												{{ $postsinfiden->modalidad }}/{{ $postsinfiden->aula }}/{{ $postsinfiden->carpeta }}
											</div>
										</div>
									</div>

								</td>
            <td data-label="Created">
              <small class="text-gray-500">{{ $postsinfiden->alumno }}</small>
            </td>
            <td data-label="Created">
              <small class="text-gray-500">{{ $postsinfiden->nombre }}</small>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
      </div>
		{{ $post_sin_f_iden->links()}}
		  @else
          <div class="flex items-center justify-between px-4">
            <small>No hay postulante sin fichas de identificacion.</small>
          </div>
          @endif
      </div>



    
    <div class="card has-table mb-3">
     <header class="card-header bg-gray-300 ">
        <p class="card-header-title ">
          Ficha de identificacion sin postulante
        </p>
      </header>

      @if($f_iden_sin_pos->count() )
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>Ciclo/Modalidad/Examen</th>
            <th>F. Identificacion/Orden</th>
            <th>Postulante</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
	     @foreach($f_iden_sin_pos as $fidensinpos)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm  text-gray-500">
												{{ $fidensinpos->ciclo }}/{{ $fidensinpos->modalidad }}/{{ $fidensinpos->examen }}
											</div>
										</div>
									</div>
			</td>
            <td class="px-6 py-4 whitespace-nowrap">

									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm text-gray-500">
												{{ $fidensinpos->identificacion }}/{{ $fidensinpos->orden }}
											</div>
										</div>
									</div>

								</td>
            <td class="px-6 py-4 whitespace-nowrap">

									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm text-red-500 font-semibold">
												{{ $fidensinpos->alumno }}
											</div>
										</div>
									</div>

								</td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
               <td >
                     <div onclick='Livewire.emit("openModal", "corregir-identificacion-component", {{ json_encode(["ciclo" => $fidensinpos->ciclo, "modalidad" => $fidensinpos->modalidad,"examen" => $fidensinpos->examen,"alumno" => $fidensinpos->alumno ]) }})'  
                        class="flex mx-auto px-4 py-2 text-xs rounded-md  font-medium  transform bg-blue-600 text-white hover:text-yellow-300  hover:scale-105">
                     <spam>Corregir</spam>
                  </div>

                                         
               </td>
              </div>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
      </div>
		{{ $f_iden_sin_pos->links()}}
		  @else
          <div class="flex items-center justify-between px-4">
            <small>No hay fichas de identificacion sin postulante.</small>
          </div>
          @endif
      </div>


</div>







