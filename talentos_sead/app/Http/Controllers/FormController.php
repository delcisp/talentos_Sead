<?php

namespace App\Http\Controllers;

use App\Models\personalData;
use App\Models\personalInfos;
use App\Models\personalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class FormController extends Controller
{

    public function salvarResposta(Request $request)
{
    $personalData = new personalData;
   $personalData->firstname = $request->input('firstname');
   $personalData->lastname = $request->input('lastname');
   $personalData->birthdate =  $request->input('birthdate');
   $personalData->cep = $request->input('cep');
   $personalData->uf = $request->input('uf');
   $personalData->atuanaarea = $request->input('atuanaarea');
   $personalData->cidade = $request->input('cidade');
   $personalData->bairro = $request->input('bairro');
   $personalData->endereco = $request->input('endereco');
   $personalData->telefone = $request->input('telefone');
   $personalData->firstquestion = $request->input('firstquestion');
   $personalData->degreetextarea = $request->input('degreetextarea');
   $personalData->bloodtype = $request->input('bloodtype');
   $personalData->raca = $request->input('raca');
   $personalData->doador = $request->input('doador');
   $personalData->genero = $request->input('genero');
   $personalData->tinycourses = $request->input('tinycourses');
   $personalData->save();
// Salva o valor da variável na sessão
  session()->put('firstname', $personalData->firstname);


   $personalInfos = new personalInfos();
   $personalInfos->personal_data_id = $personalData->id; // Chave estrangeira para personalData
   $personalInfos->situacaofunc = $request->input('situacaofunc');
   $personalInfos->departament = $request->input('departament');
   $personalInfos->funcaogratificada = $request->input('funcaogratificada');
   $personalInfos->timeofservice = $request->input('timeofservice');
   $personalInfos->role = $request->input('role');
   $personalInfos->permuta = $request->input('permuta');
   $personalInfos->formadetrabalho = $request->input('formadetrabalho');
   $personalInfos->teletrabalho = $request->input('teletrabalho');
   $personalInfos->reuniaotrabalho = $request->input('reuniaotrabalho');
   $personalInfos->competencia = json_encode($request->input('competencia'));
   $personalInfos->hardcompetencia = json_encode($request->input('hardcompetencia'));

   $personalInfos->save();
   
   $personalProfile = new personalProfile;
   $personalProfile->personal_data_id = $personalData->id; // Chave estrangeira para personalData
   $personalProfile->habespacial = $request->input('habespacial');
   $personalProfile->habcorporal = $request->input('habcorporal');
   $personalProfile->habmusical = $request->input('habmusical');
   $personalProfile->hablinguistica = $request->input('hablinguistica');
   $personalProfile->habmath = $request->input('habmath');
   $personalProfile->habinterpessoal = $request->input('habinterpessoal');
   $personalProfile->habnatureba = $request->input('habnatureba');
   $personalProfile->habemocional = $request->input('habemocional');
   $personalProfile->deadlines = $request->input('deadlines');
   $personalProfile->suggestion = $request->input('suggestion');
   $personalProfile->setorop = json_encode($request->input('setorop'));
   $personalProfile->habsace = json_encode($request->input('habsace'));
   $personalProfile->atividadesp = json_encode($request->input('atividadesp'));

   $personalProfile->save();

   return redirect()->route('agradecimento');
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        
    }
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
     
    }
}
