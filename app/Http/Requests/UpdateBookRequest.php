<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'ISBN' => 'required|string|size:13|unique:books,ISBN,' . $this->route('book')->id,
            'title' => 'required|string|max:70',
            'price' => 'required|decimal:2|min:0|max:99.99',
            'mortgage' => 'required|decimal:2|min:0|max:9999.99',
            'category_id' => 'required|integer|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
