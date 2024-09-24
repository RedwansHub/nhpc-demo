<?php

namespace App\Http\Resources;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin AuditLog */
class AuditLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,

            'id' => $this->id,
            'audit_type' => $this->audit_type,
            'notes' => $this->notes,

            'details' => $this->details,
            'related_transaction_id' => $this->ralated_transaction_id,
            'action' => $this->action,

            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'location' => $this->location,

            'is_successful' => $this->is_successful,
            'error_message' => $this->error_message,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
