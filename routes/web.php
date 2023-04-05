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
//Route::get('/tasks', function () {
// return view('tasks.index');
///});
//redirect to tasklists (button)
///Route::get('/tasklists', function () {
   /// return view('tasklists.index');
///});
Route::get('/tasks/error', function () {
    return view('tasks.error');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{id}/update', function ($id) {
    $task = Task::find($id);
    $task->finished_at = request('finished') ? now() : null;
    $task->save();
  });

Route::get('/tasklists', [TaskListController::class, 'index'])->name('tasklists.index');
Route::get('/tasklists/create', [TaskListController::class, 'create'])->name('tasklists.create');
Route::post('/tasklists', [TaskListController::class, 'store'])->name('tasklists.store');
Route::get('/tasklists/{tasklist}', [TaskListController::class, 'show'])->name('tasklists.show');
Route::get('/tasklists/{tasklist}/edit', [TaskListController::class, 'edit'])->name('tasklists.edit');
Route::put('/tasklists/{tasklist}', [TaskListController::class, 'update'])->name('tasklists.update');
Route::delete('/tasklists/{id}', [TaskListController::class, 'destroy'])->name('tasklists.destroy');

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
Route::middleware(['auth', 'checkDeletedUser'])->delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');






