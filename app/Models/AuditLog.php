<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditLog extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',

        'action',
        'details',
        'ip_address',
        'user_agent',
        'location',
        'is_successful',
        'error_message',
        'notes',
        'audit_type',
        'related_transaction_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
