<x-layout>
     
    <x-slot name="cabecera">      
         @livewire('ciclo-component')
    </x-slot>

    <x-slot name="body">
          <h1>Redy Delgado</h1>
         @livewire('tarjetas-component')
         @livewire('panel-control-component')
      
    </x-slot>

</x-layout>

