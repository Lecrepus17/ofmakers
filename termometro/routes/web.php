<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadosController;
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

Route::get('/', [DadosController::class, 'index']);
Route::get('/index', [DadosController::class, 'index'])->name('index');
Route::post('/index', [DadosController::class, 'index']);
Route::get('/delete/{dado}', [DadosController::class, 'delete'])->name('delete');
Route::get('/listagem', [DadosController::class, 'listagem'])->name('listagem');
Route::post('/listagem', [DadosController::class, 'listagem']);
