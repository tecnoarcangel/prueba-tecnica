<div>

    <div class="container grid px-6 mx-auto space-y-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Usuarios
        </h2>
        <div class="flex flex-row space-x-2">
            <div class="flex-1">
                <x-jet-input wire:model="search" type="text" placeholder="Buscar Usuarios" class="block mt-1 w-full"/>
            </div>
            <div class="flex-1 flex justify-end">
                @can('Crear Usuarios')
                <x-jet-button wire:click="$toggle('createUser')" class="py-3"> Crear Usuario </x-jet-button>
                @endcan
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <x-table class="table-fixed">
                <x-slot name="head">
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('name')" :direction=" $sortField === 'name' ? $sortDirection : null">Usuario</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('email')" :direction=" $sortField === 'email' ? $sortDirection : null">Email</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('activo')" :direction=" $sortField === 'activo' ? $sortDirection : null">Estado</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('created_at')" :direction=" $sortField === 'created_at' ? $sortDirection : null">Fecha de Creación</x-table.heading>
                    <x-table.heading class="w-1/6">Permisos</x-table.heading>
                    <x-table.heading class="w-1/6"></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($usuarios as $usuario)
                    <x-table.row wire:loading.class.delay="opacity-50">
                        <x-table.cel>
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ $usuario->profile_photo_url }}" alt="{{ $usuario->name }}" aria-hidden="true" />
                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">
                                        {{$usuario->name}}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 break-normal">
                                        {{$usuario->getRoleNames()->implode(', ')}}
                                    </p>
                                </div>
                            </div>
                        </x-table.cel>
                        <x-table.cel>{{$usuario->email}}</x-table.cel>
                        <x-table.cel>
                            <span class="px-2 py-1 font-semibold leading-tight text-{{$usuario->estado_color}}-700 bg-{{$usuario->estado_color}}-100 rounded-full dark:bg-{{$usuario->estado_color}}-700 dark:text-{{$usuario->estado_color}}-100">
                            {{$usuario->estado_nombre}}
                            </span>
                        </x-table.cel>
                        <x-table.cel>{{$usuario->created_at_for_humans}}</x-table.cel>
                        <x-table.cel>{!! $usuario->getPermissionNames()->implode('</br>')!!}</x-table.cel>
                        <x-table.cel>
                            <div class="flex items-center space-x-4 text-sm">
                                @can('Editar Usuarios')
                                <button
                                    wire:click="getUser({{$usuario->id}},'update')"
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
                                @can('Eliminar Usuarios')
                                <button
                                    wire:click="getUser({{$usuario->id}},'delete')"
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
                    Mostrando {{$usuarios->count()}} de {{$usuarios->total()}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{$usuarios->links()}}
                </span>
            </div>
        </div>
    </div>
    <div>
        @include('livewire.usuarios.create')
    </div>
    <div>
        @include('livewire.usuarios.update')
    </div>
    <div>
        @include('livewire.usuarios.delete')
    </div>
    <div>
        @include('livewire.usuarios.show')
    </div>
</div>
