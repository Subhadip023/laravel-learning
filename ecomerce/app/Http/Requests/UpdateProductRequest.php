<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProductRequest extends FormRequest
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
            'name' => ' |string|max:255',
            'description' => 'nullable|string|max:1000',
            'color' => ' |string|max:50',
            'dimention' => ' |string|max:100',
            'meterial' => ' |string|max:100',
            'price' => ' |numeric|min:0.01',
            'min_order_quantity' => ' |integer|min:1',
            'star' => 'nullable|numeric|min:0|max:5',
            'stock' => ' |integer|min:0',
'sku' => [
    'required',
    'string',
    'max:255',
    Rule::unique('products')->ignore($this->product->id),
],
            
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
