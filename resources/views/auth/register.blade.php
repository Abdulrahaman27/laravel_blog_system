{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">📝 Create Account</h1>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Full Name</label>
            <input 
                type="text" 
                name="name" 
                placeholder="Enter your full name"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

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
                placeholder="Create a password"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Confirm Password</label>
            <input 
                type="password" 
                name="password_confirmation" 
                placeholder="Re-enter your password"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

        <!-- Submit -->
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300"
            >
                Register
            </button>
        </div>

        <!-- Login Link -->
        <p class="text-center text-gray-600 text-sm mt-4">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login</a>
        </p>
    </form>
</div>
@endsection
