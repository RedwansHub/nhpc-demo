<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'application_id' => ['required', 'exists:applications'],
            'amount' => ['required', 'numeric'],
            'method' => ['required'],
            'reference' => ['required'],
            'status' => ['required'],
            'paid_at' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
