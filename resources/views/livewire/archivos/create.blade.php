<x-jet-dialog-modal wire:model="createArchivo">
    <x-slot name="title">
        Añadir Archivo
    </x-slot>

    <x-slot name="content">
        @include('livewire.archivos.form')
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('createArchivo')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            Crear
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>