<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // UM SÓ REQUEST PARA TODOS OS MÉTODOS
    switch($this->method()) {
        case 'GET':
        case 'DELETE': {
            return [
                'id' => 'required|exists:posts,id'
            ];
        }
        case 'POST' : {
            return [
               
            ];
        }
        case 'PUT':
        case 'PATCH': {
            return [ 

            ];
        }
        default;
        break;
    }
 

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
 
        ];
    }
}
