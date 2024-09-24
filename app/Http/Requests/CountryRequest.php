<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'language_id' => ['required', 'exists:languages'],
            'country_name' => ['required'],
            'country_flag' => ['required'],
            'country_shortcode' => ['required'],
            'continent' => ['required'],
            'phone_code' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
