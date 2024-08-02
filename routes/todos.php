<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(TodoController::class)->prefix('todos')->group(function () {

    Route::get('/', 'index')
        ->name('todos.index');

    Route::post('/', 'store')
        ->name('todos.store');

    Route::get('/create', 'create')
        ->name('todos.create');

    Route::get('/{todo}', 'show')
        ->name('todos.show');

    Route::get('/{todo}/edit', 'edit')
        ->name('todos.edit');

    Route::patch('/{todo}', 'update')
        ->name('todos.update');

    Route::delete('/{todo}', 'destroy')
        ->name('todos.delete');
});
