<x-jet-dialog-modal wire:model="updateArchivo">
    <x-slot name="title">
        Editar Archivo
    </x-slot>

    <x-slot name="content">
        @include('livewire.archivos.form')
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('updateArchivo')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            Actualizar
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>