<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     *Pega as regras de validação p poder aplicar essa request
     * @return array
     */
    public function rules(): array
    {
        $rules = [];

        switch ($this->method()) {
            case 'POST':
                $rules = $this->rulesForCreate();
                break;
            case 'PUT':
            case 'PATCH':
                $rules = $this->rulesForUpdate();
                break;
            case 'DELETE':
                $rules = $this->rulesForDelete();
                break;
        }

        return $rules;
    }

    /**
     * Get the validation rules for creating a new resource.
     */
    public function rulesForCreate(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'date', 
                'cep' => 'required',
                'uf' => 'required', 
                'cidade' => 'required',
                'bairro' => 'required',
                'endereco' => 'required', 
                'telefone' => 'required',
                'degreetextarea' => 'required', 
                'bloodtype' => 'required', 
                'raca' => 'required', 
                'doador' => 'required', 
                'genero' => 'required', 
                'tinycourses' => 'required', 
                'firstquestion' => 'required', 
                'situacaofunc' => 'required', 
                'departament' => 'required', 
                'funcaogratificada' => 'required', 
                'timeofservice' => 'required',
                'role' => 'required', 
                'permuta' => 'required', 
                'formadetrabalho' => 'required',  
                'teletrabalho' => 'required', 
                'reuniaotrabalho' => 'required', 
                'competencia' => 'required', 
                'hardcompetencia' => 'required', 
                'habespacial' => 'required', 
                'habcorporal' => 'required', 
                'habmusical' => 'required', 
                'hablinguistica' => 'required', 
                'habmath' => 'required',
                'habinterpessoal' => 'required', 
                'habnatureba' => 'required', 
                'habemocional' => 'required',  
                'deadlines' => 'required', 
                'suggestion' => 'required',
                'setorop' => 'required', 
                'habsace' => 'required', 
                'atividadesp' => 'required',
            // ...
        ];
    }

    /**

     */
    public function rulesForUpdate(): array
    {
        return [
            // ...
        ];
    }

    /**

     */
    public function rulesForDelete(): array
    {
        return [
            'id' => 'required|exists:posts,id',
        ];
    }
}
