<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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

   
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'',
            'priceV'=>'required',
            'priceF'=>'',
            'foto'=>'',
        ];
    }
}
