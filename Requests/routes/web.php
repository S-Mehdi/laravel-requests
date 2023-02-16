<?php

use App\Http\Controllers\UserInformations;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{requete}', function ($requete) {
//     // return view('afficher');
//     return $requete; 
// });

Route::post('/requete', [UserInformations::class, 'show'])->name('requete');

// 1 
// Route::post('/save', function () {
//     return view('welcome');
// })->name('save');


//2 

Route::post('/save', [UserInformations::class, 'store'])->name('save');


