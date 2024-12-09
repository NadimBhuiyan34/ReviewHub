<?php

namespace App\Http\Requests\Catgory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($this->route('category')), // Ignore the current category while updating
            ],
            'type' => 'required|string|in:Electronics,Furniture,Clothing,Common',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'type.required' => 'The category type is required.',
            'status.required' => 'Please select the category status.',
            'status.boolean' => 'The status must be a valid boolean value.',
        ];
    }
}
