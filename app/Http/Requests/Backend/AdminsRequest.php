<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
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
        switch ($this->method()){

            case 'POST':
            case 'PUT':
            case 'PATCH':
            {
                return [

                    'name'  => 'required|max:255' ,
                    'email'  => 'required|max:255|unique:admins,email,'.auth()->user()->id ,
                    'mobile'  => 'required|numeric|unique:admins,mobile,'.auth()->user()->id ,
                    'password' =>'nullable|min:8',

                ];
            }

            default: break;


        }
    }
}
