<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/project', [ProjectController::class, 'index']);



Route::post('login', [LoginController::class, 'login']);