<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PythonController;

Auth::routes();

Route::get('/', function () {
    return view('welcome'); // Vista con el botón para ir al formulario
});

Route::post('/execute-python', [PythonController::class, 'executePythonScript'])->name('execute.python');
Route::get('/python-form', [PythonController::class, 'showForm'])->name('python.form');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
