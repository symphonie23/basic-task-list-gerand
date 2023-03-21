<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;

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

Route::get('/', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);

Route::get('/task', [TaskController::class, 'create'])->name('tasklists.create');
Route::get('/task/{task}', [TaskController::class, 'show'])->name('tasklists.show');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('tasklists.edit');

Route::get('/tasklists', [TaskListController::class, 'index'])->name('tasklists.index');