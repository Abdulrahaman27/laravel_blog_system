<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();
        Auth::login($user);
        return redirect()->route('blogs.index')->with('success', 'Account Created successful.');
    }
    
    public function showLogin(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->filled('remember');
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('blogs.index'))->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('blogs.index');
    }
}
