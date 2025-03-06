<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymExerciseController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/gym_exercises', [GymExerciseController::class, 'index'])->name('gym_exercises.index');
    Route::get('/gym_exercises/create', [GymExerciseController::class, 'create'])->name('gym_exercises.create'); // Fix for the error
    Route::post('/gym_exercises', [GymExerciseController::class, 'store'])->name('gym_exercises.store');
    Route::get('/gym_exercises/{exercise}/edit', [GymExerciseController::class, 'edit'])->name('gym_exercises.edit');
    Route::patch('/gym_exercises/{exercise}', [GymExerciseController::class, 'update'])->name('gym_exercises.update');
    Route::patch('/gym_exercises/{exercise}/toggle', [GymExerciseController::class, 'toggle'])->name('gym_exercises.toggle');
    Route::put('/gym_exercises/{exercise}', [GymExerciseController::class, 'update'])->name('gym_exercises.update');
    Route::delete('/gym_exercises/{exercise}', [GymExerciseController::class, 'destroy'])->name('gym_exercises.destroy');
    Route::get('/dashboard', [GymExerciseController::class, 'index'])->name('dashboard');
    Route::patch('/gym_exercises/{id}/toggle', [GymExerciseController::class, 'toggle'])->name('gym_exercises.toggle');
    Route::get('/test-session', function () {
        session(['test_key' => 'test_value']);
        return 'Session value set!';
    });
    

});

require __DIR__.'/auth.php';
