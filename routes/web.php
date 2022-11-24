<?php

use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'users');	// Теперь, при открытии главной страницы "/" будет перекидывать на маршрут "users"
Route::resource('users', UsersController::class);


//Route::get('/', function () { return view('welcome');});

