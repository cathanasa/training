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
        return [
            'name' => 'required|max:30|unique:projects,name|', 
            'customer_id' => 'required', 
            'start_date' => 'required|after:yesterday', 
            'end_date' => 'required|after:start_date', 
            'active' => 'required', 
            'budget' => 'required|integer', 
            'description' => 'required'
        ];
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
            'name.unique:projects' => 'There is a project created with the same name!', 
            'name.max:30' => 'Give a shorter name!',
            'customer_id.required'  => 'A customer choice is required!', 
            'start_date.required' => 'Start date is required!',
            'start_date.after:yesterday' => 'Start date cannot be a date before today!', 
            'end_date.required' => 'End date is required!',
            'end_date.after:yesterday' => 'End date cannot be a date before start date!', 
            'active.required' => 'Active state of the project is required!',
            'budget.required' => 'Budget is required!',
            'budget.integer' => 'Bugdet must be an integer value!',
            'description.required' => 'Description is required!'
        ];
    }
}
