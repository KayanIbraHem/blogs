<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name'=>'required|min:4|max:12',
                'password'=>'required|min:4|max:14',
                'email'=>'required',
                'address'=>'required|min:4'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Sorry User Name is Required',
            'name.min'=>'Sorry User Name shloud be more than 4 characters',
            'name.max'=>'Sorry User Name should less than 12 characters',

            'password.required'=>'Sorry Password is Required',
            'password.min'=>'Sorry Password shloud be more than 4 characters',
            'password.max'=>'Sorry Password should less than 14 characters',

            'email.required'=>'Sorry Email is Required',

            'address.required'=>'Sorry Address is Required',
            'address.min'=>'Sorry Address shloud be more than 4 characters',
            
        ];
    }
}
