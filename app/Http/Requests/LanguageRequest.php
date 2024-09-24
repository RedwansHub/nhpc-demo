<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'language_name' => ['required'],
            'language_code' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
