<?php

use App\Http\Controllers\FiverController;
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

Route::get('/', [FiverController::class, 'index'])->name('home.index');
Route::post('/data', [FiverController::class, 'show'])->name('home.show');
