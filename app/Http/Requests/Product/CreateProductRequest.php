<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



     public function rules()
     { 
         return [
             'category_id' => ['required'],
             'name' => ['required','string'],
             'stock' => ['required','numeric'],
             'precio' => ['required','numeric'],
             'description' => ['required','string','min:15'],
         ];
     }
 
     public function messages(){
 
         return [
             'category_id.required' => 'La categoria es requerida.',
 
             'name.required' => 'El nombre es requerido.',
             'name.string' => 'nombre no valido.',
 
             'stock.required' => 'El stock es requerido.',
             'stock.numeric' => 'stock no valido.',

             'precio.required' => 'El precio es requerido.',
             'precio.numeric' => 'precio no valido.',
 
 
             'description.required' => 'La description es requerida.',
             'description.string' => 'description no valida.',
             'description.min' => 'La description es muy corta (min 15)',
 
         ];
 
     }
}