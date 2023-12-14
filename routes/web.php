<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::controller(TodoController::class)->group(function() {
    Route::get('/', 'index')->name('todos.index');
    Route::get('create', 'create')->name('todos.create');
    Route::post('store', 'store')->name('todos.store');
    Route::get('show/{id}', 'show')->name('todos.show');
    Route::get('edit/{id}', 'edit')->name('todos.edit');
    Route::put('update/{id}', 'update')->name('todos.update');
    Route::delete('destroy/{id}', 'destroy')->name('todos.destroy');
});
