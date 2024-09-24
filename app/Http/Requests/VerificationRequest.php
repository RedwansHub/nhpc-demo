<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'status' => ['required'],
            'verified_at' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
