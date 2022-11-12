<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\StatsController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('delete_client/{id}', [ClientController::class, 'destroy'])->name('delete_client');
Route::get('/materiels', [MaterielController::class, 'index']);
Route::get('delete_materiel/{id}', [MaterielController::class, 'destroy'])->name('delete_materiel');
Route::get('/stats', [StatsController::class, 'index']);

Route::post('add_materiel_client', [IndexController::class, 'store'])->name('add_materiel_client');
Route::post('add_client', [ClientController::class, 'store'])->name('add_client');
Route::post('add_materiel', [MaterielController::class, 'store'])->name('add_materiel');


