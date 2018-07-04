<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrodocumentoFormRequest extends FormRequest
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
        'descripciondocumento'=>'required|max:500',
        'tipodocumento'=>'required',
        'documento'=>'required|mimes:pdf|max:10240',
        'idestudio2'=>'required',
        
        ];
    }
}
