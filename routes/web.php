<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::get('dashboard', [TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('tasks/{task}', [TaskController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.show');

Route::post('tasks/{task}/complete', [TaskController::class, 'complete'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.complete');


Route::get('tasks/{task}/output', [TaskController::class, 'output'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.output');

Route::delete('tasks/{task}', [TaskController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.destroy');



Route::get('pages/{page}', [PageController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('pages.show');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
