<x-jet-confirmation-modal wire:model="deleteArchivo">
    <x-slot name="title">
        Eliminar el archivo {{$nombre}}
    </x-slot>

    <x-slot name="content">
        ¿Estas seguro de eliminar este archivo? Una vez eliminado, todos los recursos seran borrados permanentemente.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button  wire:click="$toggle('deleteArchivo')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete"  wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>