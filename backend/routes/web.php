<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/store', [TaskController::class, 'store'])->name('store');
Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');
Route::patch('/{id}/update', [TaskController::class, 'update'])->name('update');
Route::delete('/{id}/destroy', [TaskController::class, 'destroy'])->name('destroy');
