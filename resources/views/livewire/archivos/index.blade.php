<div>

    <div class="container grid px-6 mx-auto space-y-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Archivos
        </h2>
        <div class="flex flex-row space-x-2">
            <div class="flex-1">
                <x-jet-input wire:model="search" type="text" placeholder="Buscar archivos" class="block mt-1 w-full"/>
            </div>
            <div class="flex-1 flex justify-end">
                @can('Crear Archivos')
                <x-jet-button wire:click="$toggle('createArchivo')" class="py-3"> Añadir Archivo </x-jet-button>
                @endcan
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <x-table class="table-fixed">
                <x-slot name="head">
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('nombre')" :direction=" $sortField === 'nombre' ? $sortDirection : null">Nombre</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('descripcion')" :direction=" $sortField === 'descripcion' ? $sortDirection : null">Descripción</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('created_at')" :direction=" $sortField === 'created_at' ? $sortDirection : null">Fecha de Creación</x-table.heading>
                    <x-table.heading class="w-1/6"></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($archivos as $archivo)
                    <x-table.row wire:loading.class.delay="opacity-50">
                        <x-table.cel>{{$archivo->nombre}}</x-table.cel>
                        <x-table.cel>{{$archivo->descripcion}}</x-table.cel>
                        <x-table.cel>{{$archivo->created_at->format('d-m-Y')}}</x-table.cel>
                        <x-table.cel>
                            <div class="flex items-center space-x-4 text-sm">
                                @can('Ver Archivos')
                                <button
                                    wire:click="getArchivo({{$archivo->id}},'show')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                @endcan
                                @can('Editar Archivos')
                                <button
                                    wire:click="getArchivo({{$archivo->id}},'update')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                @endcan
                                @can('Eliminar Archivos')
                                <button
                                    wire:click="getArchivo({{$archivo->id}},'delete')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                @endcan
                            </div>
                        </x-table.cel>
                    </x-table.row>
                    @empty

                    <x-table.row>
                        <x-table.cel colspan="7">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">Sin Resultados</span>
                            </div>
                        </x-table.cel>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Mostrando {{$archivos->count()}} de {{$archivos->total()}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{$archivos->links()}}
                </span>
            </div>
        </div>
    </div>
    <div>
        @include('livewire.archivos.create')
    </div>
    <div>
        @include('livewire.archivos.update')
    </div>
    <div>
        @include('livewire.archivos.delete')
    </div>
    <div>
        @include('livewire.archivos.show')
    </div>
</div>