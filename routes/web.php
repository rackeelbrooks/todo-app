<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoAppController;

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

Route::get('/', [TodoAppController::class, 'index'])->name('index');

Route::post('/addItem' , [TodoAppController::class , 'saveItem'])->name('saveItem');

// Another way to access the id from Frontend
// Route::post('/completeTask', [TodoAppController::class , 'completeTask'])->name('completeTask');


Route::post('/completeTask/{id}', [TodoAppController::class , 'completeTask'])->name('completeTask');

Route::get('/editTask/{id}', [TodoAppController::class , 'editTask'])->name('editTask');

Route::put('/updateTask/{id}', [TodoAppController::class , 'updateTask'])->name('updateTask');

Route::delete('/deleteTask/{id}', [TodoAppController::class , 'deleteTask'])->name('deleteTask');
