<div>
    <h1>Welcome to the Blog!</h1>

    <h2>Latest Testimonies:</h2>
    @foreach($testimonies as $testimony)
        <div>
            <img src="{{ asset('storage/' . $testimony->photo_path) }}" alt="Testimony Photo">
            <p>{{ $testimony->testimonial }}</p>
            <hr>
        </div>
    @endforeach
</div>
