<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PythonController;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PythonController::class, 'executePythonScript']);