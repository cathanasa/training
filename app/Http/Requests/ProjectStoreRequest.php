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
        $rules['start_date'] = 'required|after:yesterday';
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
        return [
            'name.required' => 'A name is required!',
            'name.unique' => 'There is a project created with the same name!', 
            'name.max' => 'Give a shorter name!',
            'customer_id.required'  => 'A customer choice is required!', 
            'start_date.required' => 'Start date is required!',
            'start_date.after' => 'Start date cannot be a date before today!', 
            'end_date.required' => 'End date is required!',
            'end_date.after_or_equal' => 'End date cannot be a date before start date!', 
            'active.required' => 'Active state of the project is required!',
            'budget.required' => 'Budget is required!',
            'budget.integer' => 'Bugdet must be an integer value!',
            'description.required' => 'Description is required!'
        ];
    }
}
