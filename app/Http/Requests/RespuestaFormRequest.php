<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespuestaFormRequest extends FormRequest
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
        'asuntorespuesta'=>'required|max:100',
        'descripcionrespuesta'=>'required|max:250',
        'descripciondocumento'=>'required|max:500',
        'tipodocumento'=>'required|max:10',
        'documento'=>'required|mimes:pdf|max:10240',
        
        ];
    }
}
