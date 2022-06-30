<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFreedom extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO - дописать проверку что она принадлежит
        //https://laravel.com/docs/9.x/validation#form-request-validation
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
            'condemned_id'=>'required|integer',
            'slug'=>'required',
            'info'=>'nullable|string',
            'startdate'=>'required|date',
            'enddate'=>'required|date'
        ];
    }
}
