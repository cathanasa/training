<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
        $rules['name'] = 'required|max:30|unique:projects,name|';
        $rules['customer_id'] = 'required';
        $rules['start_date'] = 'required';
        $rules['end_date'] = 'required|after_or_equal:start_date';
        $rules['active'] = 'required';
        $rules['budget'] = 'required|integer';
        $rules['description'] = 'required';

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
