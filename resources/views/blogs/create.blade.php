@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-8 mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">✍️ Create a New Post</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Post Title</label>
            <input 
                type="text" 
                name="title" 
                maxlength="120"
                placeholder="Enter your post title" 
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                oninput="updateTitleCount(this)"
            >
            <p class="text-sm text-gray-500 mt-1" id="titleCount">0 / 120 characters</p>
        </div>

        <!-- Body -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Post Content</label>
            <textarea 
                name="content" 
                rows="6" 
                maxlength="2000"
                placeholder="Write something amazing..." 
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                oninput="updateContentCount(this)"
            ></textarea>
            <p class="text-sm text-gray-500 mt-1" id="contentCount">0 / 2000 characters</p>
        </div>

        <!-- Category -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Category</label>
            <select 
                name="category" 
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Select category</option>
                <option value="Tech">Tech</option>
                <option value="Lifestyle">Lifestyle</option>
                <option value="Education">Education</option>
                <option value="Business">Business</option>
                <option value="Entertainment">Entertainment</option>
            </select>
        </div>

        <!-- Featured Image -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Featured Image</label>
            <input 
                type="file" 
                name="image" 
                accept="image/*"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none"
                onchange="previewImage(event)"
            >
            <div id="imagePreview" class="mt-4 hidden">
                <img id="preview" class="rounded-lg w-full object-cover h-64">
            </div>
        </div>

        <!-- Live Preview -->
        <div class="mt-10">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">🪶 Live Preview</h2>
            <div id="livePreview" class="border border-gray-200 p-5 rounded-lg text-gray-700 bg-gray-50 italic">
                Start typing to see your preview...
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300"
            >
                Publish Post
            </button>
        </div>
    </form>
</div>

<script>
    const titleCount = document.getElementById('titleCount');
    const contentCount = document.getElementById('contentCount');
    const livePreview = document.getElementById('livePreview');

    function updateTitleCount(input) {
        titleCount.textContent = `${input.value.length} / 120 characters`;
        updatePreview();
    }

    function updateContentCount(input) {
        contentCount.textContent = `${input.value.length} / 2000 characters`;
        updatePreview();
    }

    function previewImage(event) {
        const preview = document.getElementById('preview');
        const container = document.getElementById('imagePreview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        container.classList.remove('hidden');
    }

    function updatePreview() {
        const title = document.querySelector('input[name="title"]').value;
        const content = document.querySelector('textarea[name="content"]').value;
        livePreview.innerHTML = title || content 
            ? `<h3 class="text-xl font-semibold text-gray-800 mb-2">${title || '(Untitled Post)'}</h3><p>${content || ''}</p>` 
            : 'Start typing to see your preview...';
    }
</script>
@endsection
