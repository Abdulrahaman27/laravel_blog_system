{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">🔑 Login</h1>

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Email Address</label>
            <input 
                type="email" 
                name="email" 
                placeholder="Enter your email"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Password</label>
            <input 
                type="password" 
                name="password" 
                placeholder="Enter your password"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-gray-600 text-sm">Remember me</span>
            </label>
            <a href="#" class="text-blue-600 text-sm hover:underline">Forgot password?</a>
        </div>

        <!-- Submit -->
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300"
            >
                Login
            </button>
        </div>

        <!-- Register Link -->
        <p class="text-center text-gray-600 text-sm mt-4">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Register</a>
        </p>
    </form>
</div>
@endsection
