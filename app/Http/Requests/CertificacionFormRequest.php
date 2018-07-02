<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificacionFormRequest extends FormRequest
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
        'nombre'=>'required|max:200',
        'descripcion'=>'required|max:255',
        'fecha'=>'required',
        'documento'=>'required|mimes:pdf|max:10240',
        'idestudio'=>'required',
        ];
    }
}
