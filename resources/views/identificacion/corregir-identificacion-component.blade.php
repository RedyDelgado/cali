<x-modal>
    <x-slot name="title">
        Corregir DNI del postulante
    </x-slot>

    <x-slot name="content">
        <div class="grid grid-cols-3 gap-1">
          

            <label class="block mt-1 text-sm">
                <span class="text-gray-600 font-normal">
                   Ciclo: 
                </span>
                <span class="text-gray-700 font-semibold">         
                {{  $ciclo }}
                   </span>
            </label>
            <label class="block mt-1 text-sm">
                <span class="text-gray-600 font-normal">
                   Examen: 
                </span>
                <span class="text-gray-700 font-semibold">         
                {{  $examen }}
                   </span>
            </label>
            <label class="block mt-1 text-sm">
                <span class="text-gray-600 font-normal">
                   Modalidad: 
                </span>
                <span class="text-gray-700 font-semibold">         
                {{  $modalidad }}
                   </span>
            </label>
        </div>
        <div class="grid grid-cols-2 gap-1">
            <label class="block mt-1 text-sm">
                <span class="text-gray-600 font-normal">
                   DNI errado: 
                </span>
                <div class="control icons-left icons-righ">
                  <input class="input text-red-700 font-semibold bg-gray-100" type="text"  value="{{  $alumno }}" disabled>
                  <span class="icon left text-red-700"><i class="mdi mdi-close-octagon-outline "></i></span>
                </div> 
            </label>


            <label class="block mt-1 text-sm">
                <span class="text-gray-600 font-normal">
                   DNI correcto: 

                </span>
                <div class="control icons-left icons-right  ">
                  <input class="input text-green-800 font-semibold"  wire:model="dni" type="text"  value="{{  $alumno }}">
                  <span class="icon left text-green-700"><i class="mdi mdi-checkbox-marked-circle"></i></span>
                </div>

                          
            </label>

        </div>


    </x-slot>

    <x-slot name="buttons" >
        <button wire:click="$emit('closeModal')" class="flex w-32  px-4 py-2 text-sm font-medium leading-5 text-blue-600 transition-colors duration-150 bg-white border border-blue-500 rounded-lg active:bg-blue-600 hover:bg-blue-600 hover:text-white focus:outline-none focus:shadow-outline-gray">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="px-3"> Cancelar</span></button>


            <button wire:click="update" 
                wire:loading.attr="disabled" wire:target="update"
            class="flex w-34 ml-4  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-gray">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                </svg>
                <span class="px-3"> Corregir</span></button>
    </x-slot>



</x-modal>




