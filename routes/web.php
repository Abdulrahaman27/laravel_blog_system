<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::middleware(['auth'])->group(function () {
    Route::get('blogs/create',[BlogController::class,'create'])->name('blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});


// Authnetication routes
Route::get('auth/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');