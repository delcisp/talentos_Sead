<?php
use App\Http\Controllers\FormController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::post('/', function (Request $request) {
    $credentials = $request->only('username', 'password');

    $user = Auth::attempt($credentials);

    if ($user) {
        return redirect()->intended('/');
    } else {
        return back()->withErrors([
            'error' => 'Usuário ou senha inválidos.',
        ]);
    }
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

