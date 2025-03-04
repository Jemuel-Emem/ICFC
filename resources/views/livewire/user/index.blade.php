<div>
    <!-- Hero Section -->
    <div class="hero h-screen bg-cover bg-center flex items-center text-amber-800 text-shadow-md" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div class="text-center px-6 w-1/2">
            <h2 class="text-5xl font-extrabold mb-4">Welcome to Our Family</h2>
            <p class="text-lg font-medium max-w-2xl mx-auto">
                At ICFC, we believe in fostering a community rooted in faith, love, and service. Join us as we journey together in worship and spiritual growth.
            </p>
        </div>
        <div class="w-1/2 flex justify-center">
            <img src="{{ asset('images/hsas.jpg') }}" alt="Church Logo" class="max-w-full h-auto rounded-lg shadow-2xl">
        </div>
    </div>

    <!-- Updates Section -->
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Latest Updates</h2>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($updates as $update)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Update Image (Conditional Rendering) -->
                    @if ($update->image)
                        <img src="{{ asset('storage/' . $update->image) }}" alt="Update Image" class="w-full h-48 object-cover">
                    @endif

                    <!-- Update Content -->
                    <div class="p-6">
                        <!-- Date -->
                        <p class="text-sm text-gray-500 mb-2">
                            {{ $update->created_at->format('M d, Y') }} <!-- Display the date -->
                        </p>

                        <!-- Title -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $update->title }}</h3>

                        <!-- Content -->
                        <p class="text-gray-600 mb-4">{{ Str::limit($update->content, 100) }}</p>

                        <!-- Video (Conditional Rendering) -->
                        @if ($update->video)
                            <video controls class="w-full rounded-lg">
                                <source src="{{ asset('storage/' . $update->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-6">
                    No updates available.
                </div>
            @endforelse
        </div>
    </div>
</div>
