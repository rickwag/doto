<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');

Route::post('tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::post('tasks/check/{task}/{status}', [TaskController::class, 'check']);
Route::post('tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('tasks/delete/{task}', [TaskController::class, 'delete'])->name('tasks.delete');