<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', [Controller::class, 'welcome'])->name('welcome');
Route::get('/tests', function () { return view('tests'); });
Route::get('/dashboard', [Controller::class, 'dashboard'])->name('DashBoard');

Route::resources([
    'SystemS' => SystemController::class,
    'TableS' => TableController::class,
    'Fields' => FieldController::class,
    'LineS' => LineController::class,
]);
Route::post('SystemS/{System}/ReStore', [SystemController::class, 'ReStore'])->name('SystemS.ReStore');
Route::delete('Systems/{System}/Force-Delete', [SystemController::class, 'ForceDelete'])->name('SystemS.ForceDelete');
Route::post('Tables/{Table}/ReStore', [TableController::class, 'ReStore'])->name('Tables.ReStore');
Route::delete('TableS/{Table}/Force-Delete', [TableController::class, 'ForceDelete'])->name('Tables.ForceDelete');
Route::post('Fields/{Field}/ReStore', [FieldController::class, 'ReStore'])->name('Fields.ReStore');
Route::delete('Fields/{Field}/Force-Delete', [FieldController::class, 'ForceDelete'])->name('Fields.ForceDelete');
Route::post('Lines/{Line}/ReStore', [LineController::class, 'ReStore'])->name('Lines.ReStore');
Route::delete('Lines/{Line}/Force-Delete', [LineController::class, 'ForceDelete'])->name('Lines.ForceDelete');

Route::group(['prefix' => 'profile'], function () {
    Route::post('/', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/', [ProfileController::class, 'put'])->name('profile.put');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
