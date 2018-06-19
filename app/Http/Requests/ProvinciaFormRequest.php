<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinciaFormRequest extends FormRequest
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
        'codigo'=>'required|max:6',
        'iddepartamento'=>'required',
        'nombre'=>'required|max:50',
        ];
    }
}
