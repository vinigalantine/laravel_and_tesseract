<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image_to_read' => 'required|image|mimes:jpeg,png,jpg,svg|max:5000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        
        return [
            'image_to_read.file' => 'São aceitas apenas imagens.',
            'image_to_read.max' => 'A imagem não pode exceder os 5 megabytes.',
            'image_to_read.mimes' => 'Apenas são aceitos arquivos nos seguintes formatos: jpeg,png,jpg,svg.',
        ];
    }
}
