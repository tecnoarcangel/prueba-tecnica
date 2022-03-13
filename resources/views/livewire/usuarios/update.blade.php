<x-jet-dialog-modal wire:model="updateUser">
    <x-slot name="title">
        Editar Usuario
    </x-slot>

    <x-slot name="content">
        @include('livewire.usuarios.form')
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('updateUser')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            Actualizar
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
