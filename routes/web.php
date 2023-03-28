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

Route::get('/', function () {
    return view('home');
});
//button to tasks (button)
Route::get('/tasks', function () {
    return view('tasks.index');
});
//redirect to tasklists (button)
Route::get('/tasklists', function () {
    return view('tasklists.index');
});
Route::get('/tasks/error', function () {
    return view('tasks.error');
});

Route::resource("/tasks", TaskController::class);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{id}/update', function ($id) {
    $task = Task::find($id);
    $task->finished_at = request('finished') ? now() : null;
    $task->save();
  });

Route::resource("/tasklists", TaskListController::class);
Route::post('/tasklists', [TaskListController::class, 'store']);
Route::delete('/tasklists/{task}', [TaskListController::class, 'destroy']);
Route::get('/tasklists/{id}/edit', [TaskListController::class, 'edit'])->name('tasklists.edit');
Auth::routes();

//Authentication//
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasklists', [TaskListController::class, 'index'])->name('tasklists.index'); 
});
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); 
});
