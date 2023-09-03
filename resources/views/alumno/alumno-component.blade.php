<div>
    <div class="card has-table mb-3">
     <header class="card-header bg-gray-300">
        <p class="card-header-title">
          Postulantes al examen de admisión
        </p>




      </header>    
		@if($alumnos->count())

      <div class="card-content">
        
        <div class="bg-white px-4 py-2 align-middle inline-block min-w-full">
			<label class="block">
               <span class="text-gray-700">Por: DNI/nombre</span>
               <input type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500
                     text-gray-900  focus:outline-none focus:ring-red-300 focus:border-red-300 focus:z-10 sm:text-sm" wire:model="search"  placeholder="Buscar">
            </label>
		</div>

        <table>
          <thead>
          <tr>
            <th>Modalidad</th>
            <th>DNI</th>
            <th>Carrera</th>
            <th>Nombre</th>
            <th>Aula</th>
            <th>Carpeta</th>
          </tr>
          </thead>
          <tbody>
		 @foreach($alumnos as $postulante)
          <tr>
            <td>
              <small class="text-gray-500">{{ $postulante->modalidad }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $postulante->alumno }}</small></td>
            <td>
              <small class="text-gray-500">{{ $postulante->carrera }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $postulante->nombre }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $postulante->aula }}</small>
            </td>
            <td>
              <small class="text-gray-500">{{ $postulante->carpeta }}</small>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
      </div>
		{{ $alumnos->links()}}
		  @else
          <div class="flex items-center justify-between px-4">
            <small>No hay alumnos.</small>
          </div>
          @endif
      </div>
</div>
