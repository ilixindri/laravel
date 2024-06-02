<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
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

Route::get('/', function () { return view('welcome'); });
Route::get('/tests', function () { return view('tests'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/LoadING/{NextRoute}/', [Controller::class, 'LoadING'])->name('x4');
Route::get('/load0/{next}/', [Controller::class, 'load0']);
Route::get('/load02/{next}/', 'App\Http\Controllers\Controller@load0');
Route::get('/load1/{next}/', [Controller::class, 'load1']);
Route::get('/load12/{next}/', 'App\Http\Controllers\Controller@load1');
Route::get('/load2/{next}/', [Controller::class, 'load2']);
Route::get('/load22/{next}/', 'App\Http\Controllers\Controller@load2');
Route::get('/load3/{next}/', [Controller::class, 'load3']);
Route::get('/load32/{next}/', 'App\Http\Controllers\Controller@load3');
Route::get('/load4/{next}/', [Controller::class, 'load4']);
Route::get('/load42/{next}/', 'App\Http\Controllers\Controller@load4');
Route::get('/load5/{next}/', [Controller::class, 'load5']);
Route::get('/load52/{next}/', 'App\Http\Controllers\Controller@load5');

require __DIR__.'/auth.php';
