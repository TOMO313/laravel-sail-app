<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    'controller' => PostController::class,
    'prefix' => "posts",
    ], function()
{
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('{post}', 'show')->name('show');
    Route::get('{post}/edit', 'edit')->name('edit');
    Route::post('store', 'store')->name('store');
    Route::put('{post}', 'update')->name('update');
    Route::delete('{post}', 'delete')->name('delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';