<?php

use App\Http\Controllers\AgradecimentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/waidt', function() {
    return view('waidt');
});
Route::get('/lgpd', function() {
    return view('lgpd');
});
Route::get('form', function() {
    return view('form');
});

Route::resource('agradecimento', AgradecimentoController::class);


Route::get('dashboard', function() {
    return view('dashboard');
});
Route::get('dashtable', function() {
   return view('dashtable');
});

