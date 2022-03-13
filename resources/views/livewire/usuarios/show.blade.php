<x-jet-dialog-modal wire:model="showUser">
    <x-slot name="title">
        Ver Usuario
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showUser')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
