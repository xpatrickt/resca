<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
        'nombre'=>'required|max:50|alpha_spaces',
        'apellidos'=>'required|max:100|alpha_spaces',
        'dni'=>'required|digits:8',
        'telefono'=>'required|digits:9',
        'direccion'=>'required|max:100',
        'email'=>'nullable|max:200|email',
        ];
    }
}
