{{-- resources/views/blogs/index.blade.php --}}
@extends('layouts.app')

@section('title', 'All Posts - Laravel Blog')

@section('content')
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-16 text-center shadow-md">
        <h1 class="text-4xl font-extrabold mb-2">📰 Latest Blog Posts</h1>
        <p class="text-blue-100 text-lg">Discover inspiring stories, tech insights, and more.</p>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-12">

        <!-- Search Bar -->
        <div class="flex justify-center mb-8">
            <input 
                type="text" 
                placeholder="Search posts..." 
                class="w-full max-w-lg border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Posts Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 6; $i++)
            <div class="bg-white shadow rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">
                <img 
                    src="https://source.unsplash.com/random/600x400?sig={{ $i }}" 
                    alt="Post image" 
                    class="w-full h-48 object-cover"
                >

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600 cursor-pointer">
                        Sample Blog Post Title {{ $i }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">
                        This is a short preview of the post content... Learn more about Laravel, Tailwind CSS, and web development!
                    </p>

                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>👤 John Doe</span>
                        <span>📅 Oct 16, 2025</span>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <a href="#" class="text-blue-600 font-medium hover:underline">Read More →</a>
                        <div class="space-x-2">
                            <a href="#" class="text-gray-500 hover:text-blue-600 transition">Edit</a>
                            <a href="#" class="text-red-500 hover:text-red-700 transition">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-3 py-2 bg-gray-200 rounded hover:bg-blue-600 hover:text-white">1</a>
                <a href="#" class="px-3 py-2 bg-gray-200 rounded hover:bg-blue-600 hover:text-white">2</a>
                <a href="#" class="px-3 py-2 bg-gray-200 rounded hover:bg-blue-600 hover:text-white">3</a>
            </nav>
        </div>

    </main>
@endsection
