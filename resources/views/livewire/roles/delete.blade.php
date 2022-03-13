<x-jet-confirmation-modal wire:model="deleteRol">
    <x-slot name="title">
        Eliminar el rol {{$name}}
    </x-slot>

    <x-slot name="content">
        ¿Estas seguro de eliminar este rol? Una vez eliminada, sera revocado de todos los usuarios.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button  wire:click="$toggle('deleteRol')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete"  wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
