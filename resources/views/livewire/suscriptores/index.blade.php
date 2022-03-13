<div>

    <div class="container grid px-6 mx-auto space-y-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Suscriptores
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">

            @can('Crear Suscriptor')
            <form wire:submit.prevent="save" class="w-full">
                <div class="flex flex-col items-start p-4 space-y-4">
                    <div class="flex items-center w-full border-b pb-4">
                        <div class="text-gray-900 font-medium text-lg">{{ isset($suscriptorId) ? 'Editar suscriptor' : 'Agregar suscriptor' }}</div>
                    </div>
                    <div class="flex flex-row w-full space-x-4">
                        <div class="flex-1">
                            <label class="block font-medium text-sm text-gray-700" for="title">
                                Email
                            </label>
                            <input
                                wire:model.defer="suscriptor.email"
                                type="email"
                                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                            />
                            @error('suscriptor.email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block font-medium text-sm text-gray-700" for="title">
                                Activo
                            </label>
                            <x-toggle wire:model="suscriptor.active"/>
                            @error('suscriptor.active') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="ml-auto">
                        <x-jet-button type="submit" class="py-3"> {{ isset($suscriptorId) ? 'Guardar Cambios' : 'Guardar' }} </x-jet-button>
                    </div>
                </div>
            </form>
            <div class="flex items-center w-full border-t pb-4 pt-4">
                <div class="flex-1">
                    <div class="text-gray-900 font-medium text-lg">Carga Masiva</div>
                </div>
                <div class="flex-1">
                    @livewire('suscriptors-massive-load')
                </div>
            </div>
            @endcan
        </div>

        <div class="flex flex-row space-x-2">
            <div class="flex-1">
                <x-jet-input wire:model="searchColumns.email" type="text" placeholder="Buscar" class="block mt-1 w-full"/>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <table class="table min-w-full mb-4">
                <thead>
                    <tr>
                        <th wire:click="sortByColumn('email')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                            Email
                            @if ($sortColumn == 'email')
                                <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                            @endif
                        </th>
                        <th wire:click="sortByColumn('active')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                            Activo
                            @if ($sortColumn == 'active')
                                <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                            @endif
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($suscriptores as $suscriptor)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $suscriptor->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{!! $suscriptor->active ?'<i class="fa fa-fw fa-check-circle" style="color:green"></i>' :'<i class="fa fa-fw fa-times-circle" style="color:red"></i>' !!}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            <div class="flex items-center space-x-4 text-sm">
                                @can('Editar Suscriptor')
                                <button
                                    wire:click="edit({{$suscriptor->id}})"
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
                                @can('Eliminar Suscriptor')
                                <button
                                    wire:click.prevent="deleteConfirm({{ $suscriptor->id }})"
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    {{ $suscriptores->links() }}
</div>
