<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'institution_id' => ['required', 'exists:institutions'],
            'payment_id' => ['required', 'exists:payments'],
            'type' => ['required'],
            'status' => ['required'],
            'issued_at' => ['required', 'date'],
            'expires_at' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
