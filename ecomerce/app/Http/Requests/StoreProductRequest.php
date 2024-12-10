<?php

namespace App\Http\Requests;

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
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string|max:50',
            'dimention' => 'required|string|max:100',
            'meterial' => 'required|string|max:100',
            'price' => 'required|numeric|min:0.01',
            'min_order_quantity' => 'required|integer|min:1',
            'star' => 'nullable|numeric|min:0|max:5',
            'stock' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku|max:255',
            'category_id' => 'nullable|exists:categories,id', 
        ];
    }
}
