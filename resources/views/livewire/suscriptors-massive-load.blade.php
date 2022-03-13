<div>
    <form wire:submit.prevent="import" class="flex flex-row">
        <div class="flex-1">
            <input type="file" wire:model="archivo">

            @error('archivo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex-1">
            <x-jet-button type="submit">Subir</x-jet-button>
        </div>
    </form>
</div>
