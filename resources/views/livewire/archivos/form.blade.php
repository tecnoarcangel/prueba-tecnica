<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nombre</span>
        <x-jet-input wire:model="nombre" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre del archivo" />
        @error('nombre')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Descripción</span>
        <textarea wire:model="descripcion" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"></textarea> 
        @error('descripcion')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Archivo</span>
        <input wire:model="archivo" type="file" id="archivo" style="opacity: 0; width: 0.1px; height: 0.1px;">
        <label class="btn btn-info btn-sm link-light"  for="archivo">{{$this->archivo?'Seleccionar otro archivo':'Seleccionar archivo'}}</label>
        @error('archivo')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

</div>