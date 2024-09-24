<?php

namespace App\Http\Resources;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin License */
class LicenseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'status' => $this->status,
            'issued_at' => $this->issued_at,
            'expires_at' => $this->expires_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'institution_id' => $this->institution_id,
            'payment_id' => $this->payment_id,

            'institution' => new InstitutionResource($this->whenLoaded('institution')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
        ];
    }
}
