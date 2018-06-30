<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntidadFormRequest extends FormRequest
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
        'nombre'=>'required|max:100|alpha_spaces',
        'direccion'=>'required|max:50',
        'telefono'=>'required|max:12',
        'email'=>'nullable|max:200|email',
        'ruc'=>'required|digits:11',
        'idactividad'=>'required',
        ];
    }
}
