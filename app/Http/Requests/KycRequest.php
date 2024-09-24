<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KycRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'address' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone_number' => ['required'],
            'document_type' => ['required'],
            'document_number' => ['required'],
            'document_upload' => ['required'],
            'status' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
