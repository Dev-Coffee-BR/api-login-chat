<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'string'],
            'cover' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg,kra', 'max:20480'],
            'seasons' => ['required', 'integer', 'min:1', 'max:50'],
            'episodes' => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }
}
