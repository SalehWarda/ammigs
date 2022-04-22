<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',


                ];
            }
            default: break;

        }
    }

    public function attributes()
    {
        return [

            'name_ar' => 'name',
            'name_en' => 'name',

        ];
    }
}
