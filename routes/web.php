<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\File;
Route::get('/{any}', function () {
    return File::get(public_path('index.html'));
})->where('any', '.*');
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'index']);
*/