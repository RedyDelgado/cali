<div>
    <div class="card has-table">
      <header class="card-header">
        <div class="card-header-title">
         	<div class="bg-white py-2 align-middle inline-block min-w-full">
							<label class="block">
                    <span class="text-gray-700">Por: dni/nombre/orden/identificación</span>
                    <input type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500
                     text-gray-900  focus:outline-none focus:ring-red-300 focus:border-red-300 focus:z-10 sm:text-sm" wire:model="search"  placeholder="Buscar">
                    </label>

					</div>
        </div>
      
      </header>
      <div class="card-content">
	  @if($users->count())
        <table>
          <thead>
          <tr>
            <th></th>
            <th>DNI/Postulante</th>
            <th>Carrera/Grupo</th>
            <th>Orden/Id. F. Ident</th>
            <th>Orden/Id. F. Respt</th>
            <th>Tema</th>
            <th>Respuestas</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
          <tr>
            <td class="image-cell">              
              <div class="image">
                <img src="https://avatars.dicebear.com/v2/initials/{{ $user->nombre }}.svg" alt="{{ $user->nombre }}" class="rounded-full">
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm font-medium text-gray-900">
												{{ $user->alumno }}
											</div>
											<div class="text-sm text-gray-500">
												{{ $user->nombre }}
											</div>
										</div>
									</div>
			</td>
            <td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">{{ $user->carrera }}</div>
									<div class="text-sm text-gray-500">{{ $user->grupo }}</div>
								</td>
            <td class="px-6 py-4 whitespace-nowrap">

									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm font-medium text-gray-900">
												{{ $user->orden }} /
												{{ $user->identificacion }}
											</div>
										</div>
									</div>

								</td>
            <td class="px-6 py-4 whitespace-nowrap">

									<div class="flex items-center">
										<div class="ml-0">
											<div class="text-sm font-medium text-gray-900">
												{{ $user->orden_respuestas }} /
												{{ $user->identificacion_respuestas }}
											</div>
										</div>
									</div>

								</td>
            <td data-label="Created">
              <small class="text-gray-500">{{ $user->tema }}</small>
            </td>
            <td data-label="Created">
              <small class="text-gray-500">{{ $user->respuestas }}</small>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
               <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
									<a href="{{ route('exportexcel', array($user->ciclo, $user->examen,$user->identificacion,$user->grupo,$user->tema,$user->modalidad))}}" class="button small bg-blue-700  text-white hover:text-yellow-200 hover:bg-purple-700"><span class="icon"><i class="mdi mdi-download"></i></span></a>
				</td>
              </div>
            </td>
          </tr>
		  @endforeach
          </tbody>
        </table>
        <div class="bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
		{{ $users->links()}}
		</div>
        <div class="table-pagination">
		  @else
          <div class="flex items-center justify-between">
            <small>No hay resultados para la busqueda "{{$search}}"</small>
          </div>
          @endif
        </div>
      </div>
    </div>
</div>
