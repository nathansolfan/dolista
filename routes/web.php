<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Route::get('/create', function () {
//     return view('create');
// });

Route::resource('/tasks', TaskController::class);
