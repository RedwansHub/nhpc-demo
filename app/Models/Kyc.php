<?php

namespace App\Models;

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
        'document_type',
        'document_number',
        'document_upload',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
