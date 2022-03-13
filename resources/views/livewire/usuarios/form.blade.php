<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nombre</span>
        <x-jet-input wire:model="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre Completo" />
        @error('name')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Correo Electronico</span>
        <input type="email" wire:model="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Correo Electrónico" />
        @error('email')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
        <input type="password" wire:model="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Contraseña" />
        @error('password')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Confirmar Contraseña</span>
        <input type="password" wire:model="password_confirmation" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Confirmar Contraseña" />
        @error('password_confirmation')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>
    <div class="mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Activo
        </span>
        <div class="mt-2">
            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model="activo" value="1" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">Activo</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model="activo" value="0"  class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">Inactivo</span>
            </label>
        </div>
        @error('activo')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </div>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Rol
        </span>
        <select wire:model="role" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="0">Seleccione Uno</option>
            @foreach ($roles as $rol )
            <option value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select>
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Permisos
        </span>
        <select wire:model="permisions" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple>
            @foreach ($permisos as $permiso )
            <option value="{{$permiso->id}}">{{$permiso->name}}</option>
            @endforeach
        </select>
    </label>
</div>
