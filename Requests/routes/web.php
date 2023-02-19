<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;


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




//route pour request.blade.php
Route::get('/', function () {return view('request');});

//route pour result.blade.php
Route::post('/request-result', [RequestController::class, 'show'])->name('request-result');





