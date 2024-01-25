<div>
    @if(session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submitTestimony">
        <div>
            <label for="photo">Upload Photo:</label>
            <input type="file" wire:model="photo" accept="image/*">
            @error('photo') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="testimonial">Testimonial:</label>
            <textarea wire:model="testimonial"></textarea>
            @error('testimonial') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Submit Testimony</button>
    </form>

        <div>
            <h2>Testimonies:</h2>
            @foreach($testimonies as $testimony)
                <div>
                    <img src="{{ asset('storage/' . $testimony->photo_path) }}" alt="Testimony Photo">
                    <p>{{ $testimony->testimonial }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
</div>
