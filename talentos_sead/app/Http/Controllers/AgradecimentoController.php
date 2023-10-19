<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgradecimentoController extends Controller
{
   public function index () {
    return view('agradecimento');
   }
}
