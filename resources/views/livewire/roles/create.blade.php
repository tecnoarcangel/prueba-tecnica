<x-jet-dialog-modal wire:model="createRol">
    <x-slot name="title">
        Crear Rol
    </x-slot>

    <x-slot name="content">
        @include('livewire.roles.form')
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('createRol')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            Crear
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
