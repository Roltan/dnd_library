<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IdsRequest extends FormRequest
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
            'id' => ['required', function ($attribute, $value, $fail) {
                // Проверяем, что значение либо массив, либо целое число
                if (!is_numeric($value) && !is_array($value)) {
                    $fail('The ID must be either an integer or an array of integers.');
                } elseif (is_array($value) && !empty(array_filter($value, fn($item) => !is_numeric($item)))) {
                    $fail('All elements in the ID array must be integers.');
                }
            }]
        ];
    }
}
