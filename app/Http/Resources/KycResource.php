<?php

namespace App\Http\Resources;

use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Kyc */
class KycResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'document_type' => $this->document_type,
            'document_number' => $this->document_number,
            'document_upload' => $this->document_upload,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
        ];
    }
}
