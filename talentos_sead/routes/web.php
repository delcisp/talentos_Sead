<?php
use App\Http\Controllers\FormController;
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
Route::get('agradecimento', function() {
    return view('agradecimento');
});

Route::post('/agradecimento', ['App/Http/Controllers/FormController::class', 'salvarResposta']);
Route::get('dashboard', function() {
    return view('dashboard');
});
Route::get('dashtable', function() {
   return view('dashtable');
});

