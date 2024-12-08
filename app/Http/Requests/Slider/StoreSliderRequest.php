<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string|max:500',
            'status' => 'required|boolean',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'The slider title is required.',
            'title.string' => 'The slider title must be a valid string.',
            'title.max' => 'The slider title must not exceed 255 characters.',
            'title.unique' => 'A slider with this title already exists.',
            'description.string' => 'The description must be a valid string.',
            'description.max' => 'The description must not exceed 1000 characters.',
            'image.file' => 'The uploaded file must be a valid image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image size must not exceed 2MB.',
            'order.integer' => 'The order must be a valid integer.',
            'is_active.required' => 'The slider status is required.',
            'is_active.boolean' => 'The slider status must be either true or false.',
        ];
    }
}
