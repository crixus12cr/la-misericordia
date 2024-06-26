<?php

use App\Http\Controllers\AdminTurnController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurnController;
use App\Models\Turn;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', [TurnController::class, 'index']);
Route::get('/turns/create', [TurnController::class, 'create']);
Route::post('/turns/store', [TurnController::class, 'store']);

Route::get('/dashboard', [AdminTurnController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/turns/{id}', [TurnController::class, 'update'])->name('turns.update');
    Route::get('/modulos', [CategoryController::class, 'index'])->name('module');
    Route::put('/modulos/{id}', [CategoryController::class, 'update'])->name('categories.update');
});


