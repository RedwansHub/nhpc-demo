<?php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Country */
class CountryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'country_name' => $this->country_name,
            'country_flag' => $this->country_flag,
            'country_shortcode' => $this->country_shortcode,
            'continent' => $this->continent,
            'phone_code' => $this->phone_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'language_id' => $this->language_id,

            'language' => new LanguageResource($this->whenLoaded('language')),
        ];
    }
}
