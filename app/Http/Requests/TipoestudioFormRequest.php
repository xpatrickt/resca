<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoestudioFormRequest extends FormRequest
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
        'siglas'=>'required|max:10|alpha_spaces',
        ];
    }
}
