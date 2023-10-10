<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgradecimentoController extends Controller
{
    public function index() {
        $firstname = "delci";
        return view('agradecimento', ['firstname' => $firstname]);
    }
}
