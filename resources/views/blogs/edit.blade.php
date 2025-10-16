<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Laravel Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">MyBlog</a>

            <div class="space-x-4">
                <a href="{{ route('blogs.index') }}" class="text-gray-600 hover:text-blue-600">All Posts</a>
                <a href="{{ route('blogs.create') }}" class="text-gray-600 hover:text-blue-600">Create</a>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Edit Post Form -->
    <main class="flex-grow container mx-auto px-4 py-10">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-8">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">🛠️ Edit Post</h1>

            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                {{-- @method('PATCH') — will be added later when backend is ready --}}

                <!-- Title -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Post Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        value="Sample Post Title"
                        maxlength="120"
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
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        oninput="updateContentCount(this)"
                    >Sample content goes here...</textarea>
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
                        <option value="Tech" selected>Tech</option>
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
                    <div id="imagePreview" class="mt-4">
                        <img id="preview" src="https://via.placeholder.com/600x300" class="rounded-lg w-full object-cover h-64">
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex justify-end space-x-3">
                    <a href="#" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition">Cancel</a>
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300"
                    >
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto py-4 text-center text-gray-500">
        © {{ date('Y') }} MyBlog. All rights reserved.
    </footer>

    <script>
        const titleCount = document.getElementById('titleCount');
        const contentCount = document.getElementById('contentCount');

        function updateTitleCount(input) {
            titleCount.textContent = `${input.value.length} / 120 characters`;
        }

        function updateContentCount(input) {
            contentCount.textContent = `${input.value.length} / 2000 characters`;
        }

        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>
</html>
