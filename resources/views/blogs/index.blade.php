<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ url('/') }}" class="text-xl font-semibold text-blue-600">MyBlog</a>

            <div class="space-x-4">
                <a href="{{ route('blogs.index') }}" class="hover:text-blue-600">Posts</a>
                <a href="{{ route('blogs.create') }}" class="hover:text-blue-600">New Post</a>
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} MyBlog. All rights reserved.
    </footer>
</body>
</html>
