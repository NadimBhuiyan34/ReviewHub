<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'brand_id' => 'required|uuid|exists:brands,id',
            'shop_id' => 'required|uuid|exists:shops,id',
            'category_id' => 'required|uuid|exists:categories,id',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'model_no' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website_url' => 'nullable|url',
            'variant_type.*' => 'nullable|string|max:255',
            'variant_value.*' => 'nullable|string|max:255',
        ];
    }
}
