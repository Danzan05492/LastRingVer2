<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCondemned extends FormRequest
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
            'family'=>'required',
            'name'=>'required',
            'illness_id'=>'integer',
            'gender'=>'required',
            'thumbnail'=>'nullable|image',
            'birthday'=>[
                'date',
                'before:today'
            ]
        ];
    }
}
