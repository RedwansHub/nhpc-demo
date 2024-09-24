<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditLogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],

            'action' => ['required'],
            'details' => ['required'],
            'ip_address' => ['required'],
            'user_agent' => ['required'],
            'location' => ['required'],

            'is_successful' => ['required'],
            'error_message' => ['required'],

            'notes' => ['required'],
            'audit_type' => ['required'],

            'related_transaction_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
