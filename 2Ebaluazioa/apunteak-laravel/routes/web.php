<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanaController;
use App\Http\Controllers\PertsonaController;

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

Route::get('/proba', function () {
    return view('app');
});

Route::get('/lanak', [LanaController::class, 'index'])->name('lanak.index');
Route::post('/lanak', [LanaController::class, 'store'])->name('lanak.store');
Route::get('/lanak/{id}', [LanaController::class, 'show'])->name('lanak.show');
Route::patch('/lanak/{id}', [LanaController::class, 'update'])->name('lanak.update');
Route::delete('/lanak/{id}', [LanaController::class, 'destroy'])->name('lanak.destroy');

Route::get('/pertsonak', [PertsonaController::class, 'index'])->name('pertsona.index');
Route::post('/pertsonak', [PertsonaController::class, 'store'])->name('pertsona.store');
Route::get('/pertsonak/{id}', [PertsonaController::class, 'show'])->name('pertsona.show');
Route::patch('/pertsonak/{id}', [PertsonaController::class, 'update'])->name('pertsona.update');
Route::delete('/pertsonak/{id}', [PertsonaController::class, 'destroy'])->name('pertsona.destroy');


