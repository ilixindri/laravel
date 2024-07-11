<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () { return view('welcome'); });
Route::get('/tests', function () { return view('tests'); });

Route::get('/DashBoard', function () {
    $user = User::find('1');
    Auth::login($user);
    return view('DashBoard');
})->name('DashBoard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/LoadING/{Route}/', [Controller::class, 'LoadING'])->name('LoadING');

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

require __DIR__.'/auth.php';
