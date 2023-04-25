<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/create', [TaskController::class, 'index'])->name('task.create')->middleware('auth');
Route::post('/create/store', [TaskController::class, 'store'])->name('task.store')->middleware('auth');