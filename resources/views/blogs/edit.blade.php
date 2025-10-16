@extends('layouts.app')

@section('title', 'Edit Post - Laravel Blog')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">🛠️ Edit Post</h1>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Post Title</label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $blog->title) }}"
                    maxlength="120"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    oninput="updateTitleCount(this)"
                >
                <p class="text-sm text-gray-500 mt-1" id="titleCount">{{ strlen($blog->title) }} / 120 characters</p>
            </div>

            <!-- Body -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Post Content</label>
                <textarea 
                    name="content" 
                    rows="6"
                    maxlength="2000"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    oninput="updateContentCount(this)"
                >{{ old('content', $blog->content) }}</textarea>
                <p class="text-sm text-gray-500 mt-1" id="contentCount">{{ strlen($blog->content) }} / 2000 characters</p>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Category</label>
                <select name="category" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @php
                        $categories = ['Tech', 'Lifestyle', 'Education', 'Business', 'Entertainment'];
                    @endphp
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ $blog->category === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Current Image -->
            @if($blog->image_path)
                <p class="text-gray-600 mb-2">Current Image:</p>
                <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Current Image" class="mb-4 rounded-lg w-full object-cover h-64">
            @endif

            <!-- New Image -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Replace Image</label>
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none" onchange="previewImage(event)">
                <div id="imagePreview" class="mt-4 hidden">
                    <img id="preview" class="rounded-lg w-full object-cover h-64">
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('blogs.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Update Post</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    const titleCount = document.getElementById('titleCount');
    const contentCount = document.getElementById('contentCount');
    const livePreview = document.getElementById('livePreview');

    function updateTitleCount(input) {
        titleCount.textContent = `${input.value.length} / 120 characters`;
    }

    function updateContentCount(input) {
        contentCount.textContent = `${input.value.length} / 2000 characters`;
    }

    function previewImage(event) {
        const preview = document.getElementById('preview');
        const container = document.getElementById('imagePreview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        container.classList.remove('hidden');
    }
</script>
@endsection
