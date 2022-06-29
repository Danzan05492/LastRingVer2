<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePoint extends FormRequest
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
            'freedom_id'=>'required|integer',
            //'owner_id'=>'required|integer',
            'startdate'=>'required|date',
            'enddate'=>'required|date',
            'node_id'=>'required|integer',
            'status'=>'required|integer',
            'info'=>'nullable|string'
        ];
    }
}
