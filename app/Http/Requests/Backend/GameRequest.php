<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'category_id' => 'required',
                    'available_to' => 'required',
                    'status' => 'required',
                    'images' => 'required',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:5000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'category_id' => 'required',
                    'available_to' => 'required',
                    'status' => 'required',
                    'images' => 'required',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:5000'
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
            'description_ar' => 'description',
            'description_en' => 'description',
            'available_to' => 'available',
            'category' => 'category',
            'status' => 'status',




        ];
    }
}
