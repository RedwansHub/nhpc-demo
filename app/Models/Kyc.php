<?php

namespace App\Models;

use App\Enums\KycDocumentType;
use App\Enums\KycStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kyc extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'email',
        'phone_number',
        'status',
        'document_type',
        'document_number',
        'document_upload',
    ];

    protected $casts = [
        'document_type' => KycDocumentType::class,
        'status' => KycStatus::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
