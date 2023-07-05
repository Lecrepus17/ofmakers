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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [DadosController::class, 'index'])->name('bootstrap');
Route::get('/index2', [DadosController::class, 'index2'])->name('index2');
Route::post('/index2', [DadosController::class, 'index2']);
