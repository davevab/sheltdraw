<div>
    <form wire:submit="save">
        <input type="file" wire:model="photo">

        @error('photo') <span class="error">{{ $message }}</span> @enderror

        <button type="submit" class="bg-gray-500">Save photo</button>
    </form>

    @if($photo)
        <img src="{{ asset('storage/' . $photo) }}" alt="Saved Photo">
    @endif
</div>
