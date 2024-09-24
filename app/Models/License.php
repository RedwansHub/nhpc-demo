<?php

namespace App\Models;

use App\Enums\LicenseStatus;
use App\Enums\LicenseType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'institution_id',
        'payment_id',
        'type',
        'status',
        'issued_at',
        'expires_at',
    ];
    protected $casts = [
        'type' => LicenseType::class,
        'status' => LicenseStatus::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    protected function casts(): array
    {
        return [
            'issued_at' => 'timestamp',
            'expires_at' => 'timestamp',
        ];
    }
}
