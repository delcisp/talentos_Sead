<?php

namespace App\Http\Controllers;

use App\Models\personalData;
use App\Models\personalInfo;
use App\Models\personalProfile;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function salvarResposta(Request $request)
{
    $user_id = auth()->user()->id; // Obtém o ID do usuário autenticado

    $personalData = new personalData;
    $personalData->user_id = $user_id; // Associa o usuário autenticado
    $personalData->firstname = $request->input('firstname');
   $personalData->lastname = $request->input('lastname');
   $personalData->birthdate =  $request->input('birthdate');
   $personalData->cep = $request->input('cep');
   $personalData->uf = $request->input('uf');
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

   $personalInfo = new personalInfo;
   $personalInfo->personal_data_id = $personalData->id; // Chave estrangeira para personalData
   $personalInfo->situacaofunc = $request->input('situacaofunc');
   $personalInfo->departament = $request->input('departament');
   $personalInfo->funcaogratificada = $request->input('funcaogratificada');
   $personalInfo->timeofservice = $request->input('timeofservice');
   $personalInfo->role = $request->input('role');
   $personalInfo->permuta = $request->input('permuta');
   $personalInfo->formadetrabalho = $request->input('formadetrabalho');
   $personalInfo->teletrabalho = $request->input('teletrabalho');
   $personalInfo->reuniaotrabalho = $request->input('reuniaotrabalho');
   $personalInfo->competencia = $request->input('competencia');
   $personalInfo->hardcompetencia = $request->input('hardcompetencia');

   $personalInfo->save();
   
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
   $personalProfile->setorop = $request->input('setorop');
   $personalProfile->habsace = $request->input('habsace');
   $personalProfile->atividadesp =$request->input('atividadesp');

   $personalProfile->save();

   // Redirecione ou retorne uma resposta, por exemplo:
   return redirect('/form')->with('status', 'Resposta salva com sucesso!');
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
