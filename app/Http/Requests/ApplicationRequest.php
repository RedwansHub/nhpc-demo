<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'type' => ['required'],
            'status' => ['required'],
            'submitted_at' => ['required', 'date'],
            'reviewed_at' => ['required', 'date'],
            'approved_at' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
