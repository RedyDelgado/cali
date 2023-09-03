<x-layout>
     
    <x-slot name="cabecera">      
         @livewire('ciclo-component')
    </x-slot>

    <x-slot name="body">

         @livewire('tarjetas-component')
         @livewire('panel-control-component')
      
    </x-slot>

</x-layout>

