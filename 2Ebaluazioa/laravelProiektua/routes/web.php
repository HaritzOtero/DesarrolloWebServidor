<?php
use App\Http\Controllers\AtazaController;
use App\Http\Controllers\PertsonaController;
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

Route::get('/atazak', function () {
    return view('atazak.index');
});

Route::post('/atazak', [AtazaController::class,'store'])->name('atazak');
Route::get('/atazak', [AtazaController::class,'index'])->name('atazak');
Route::get('/atazak/{id}', [AtazaController::class,'show'])->name('atazak-edit');
Route::patch('/atazak/{id}', [AtazaController::class,'update'])->name('atazak-update');
Route::delete('/atazak/{id}', [AtazaController::class,'destroy'])->name('atazak-destroy');
Route::resource('/pertsona', PertsonaController::class);
