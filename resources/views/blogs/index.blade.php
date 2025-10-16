@extends('layouts.app')

@section('title', 'All Posts - Laravel Blog')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($blogs as $blog)
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold">{{ $blog->title }}</h2>
                <p class="text-gray-700 mt-2">{{ Str::limit($blog->content, 150) }}</p>
                
                @if($blog->image_path)
                    <img src="{{ asset('storage/' . $blog->image_path) }}" 
                         alt="Post Image" 
                         class="mt-4 rounded-lg w-full object-cover h-64">
                @endif

                <!-- Action buttons -->
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('blogs.edit', $blog->id) }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>

                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">No posts found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $blogs->links() }}
    </div>
@endsection
