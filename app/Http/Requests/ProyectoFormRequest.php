<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoFormRequest extends FormRequest
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
        'nombre'=>'required|max:500',
        'descripcion'=>'required|max:2000',
        'objetivo'=>'required|max:500',
        'beneficiarios'=>'required|integer|between:1,999999999',
        'identidad'=>'required',
        ];
    }
}
