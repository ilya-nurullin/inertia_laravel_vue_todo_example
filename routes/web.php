<?php

use App\Http\Controllers\TodoItemController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::apiResource('todos', TodoItemController::class);

    Route::post('todos/{todo}/toggle', [TodoItemController::class, 'toggle'])->name('todos.toggle');
});

require __DIR__ . '/settings.php';
