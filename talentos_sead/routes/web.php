<?php
use App\Http\Controllers\FormController;
use App\Http\Controllers\AgradecimentoController;
use Illuminate\Support\Facades\Route;



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

Route::post('/save-this', ['App/Http/Controllers/FormController::class', 'salvarResposta']);


Route::resource('agradecimento', AgradecimentoController::class);


Route::get('dashboard', function() {
    return view('dashboard');
});
Route::get('dashtable', function() {
   return view('dashtable');
});

