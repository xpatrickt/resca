<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudioFormRequest extends FormRequest
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
        'nombre'=>'required|max:100',
        'descripcion'=>'required|max:255',
        'idproyecto'=>'required|max:10|integer',
        'idtipoevaluacion'=>'required|max:10|integer',
        'idtipoestudio'=>'required|max:10|integer',
        ];
    }
}
