<?php

namespace resca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObservacionevaluacionFormRequest extends FormRequest
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
        'asuntoobservacion'=>'required|max:100',
        'descripcionobservacion'=>'required|max:2000',
        ];
    }
}