<x-jet-confirmation-modal wire:model="deletePagina">
    <x-slot name="title">
        Eliminar el página {{$name}}
    </x-slot>

    <x-slot name="content">
        ¿Estas seguro de eliminar este página? Una vez eliminada, sera revocado de todos los usuarios.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button  wire:click="$toggle('deletePagina')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete"  wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
