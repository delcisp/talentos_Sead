<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\personalData;
use App\Models\personalInfo;
use App\Models\personalProfile;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function salvarResposta(PostRequest $request)
{

   $personalData = new personalData;
   $personalData->firstname = $request->input('firstquestion');
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
   $personalInfo->hardcompencia = $request->input('hardcompetencia');

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
