<x-jet-dialog-modal wire:model="showArchivo">
    <x-slot name="title">
        Ver Archivo
    </x-slot>

    <x-slot name="content">

        <x-table class="table-fixed">
            <x-slot name="head">
                <x-table.heading class="w-1/6 bg-gray-300 text-white">Nombre</x-table.heading>
                <x-table.heading class="w-1/6 bg-gray-300 text-white">Descripción</x-table.heading>
                <x-table.heading class="w-1/6 bg-gray-300 text-white">Descargar</x-table.heading>
            </x-slot>
            <x-slot name="body">
                <x-table.row wire:loading.class.delay="opacity-50">
                    <x-table.cel class="text-center">{{$archivo->nombre ?? ''}}</x-table.cel>
                    <x-table.cel class="text-center">{{$archivo->descripcion ?? ''}}</x-table.cel>
                    <x-table.cel class="text-center"><a href="{{$archivo?asset('storage/'.$archivo->archivo):''}}" target="_blank"><i class="fa fa-download"></i></a></x-table.cel>
                </x-table.row>
            </x-slot>
        </x-table>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showArchivo')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
