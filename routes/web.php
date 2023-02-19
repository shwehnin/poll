<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
});

require __DIR__.'/auth.php';

Route::prefix('polls')->middleware('auth')->group(function () {
    Route::get('/create', [\App\Http\Controllers\PollController::class, 'create'])->name('polls.create');
    Route::post('/create', [\App\Http\Controllers\PollController::class, 'store'])->name('polls.store');
    Route::get('/', [\App\Http\Controllers\PollController::class, 'index'])->name('polls.index');
    Route::get('/update/{poll}', [\App\Http\Controllers\PollController::class, 'edit'])->name('polls.edit');
    Route::put('/update/{poll}', [\App\Http\Controllers\PollController::class, 'update'])->name('polls.update');
    Route::get('/delete/{poll}', [\App\Http\Controllers\PollController::class, 'delete'])->name('polls.delete');
    Route::get('/show/{poll}', [\App\Http\Controllers\PollController::class, 'show'])->name('polls.show');
    Route::post('/{poll}/vote', [\App\Http\Controllers\PollController::class, 'vote'])->name('polls.vote');
});
