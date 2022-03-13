<x-jet-confirmation-modal wire:model="deleteUser">
    <x-slot name="title">
        Eliminar el usuario {{$name}}
    </x-slot>

    <x-slot name="content">
        ¿Estas seguro de eliminar esta cuenta? Una vez eliminada, toda su información y recursos seran borrados permanentemente.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button  wire:click="$toggle('deleteUser')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete"  wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
