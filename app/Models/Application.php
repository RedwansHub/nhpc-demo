<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'type',
        'status',
        'submitted_at',
        'reviewed_at',
        'approved_at',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasOne
    {
        return $this->HasOne(Payment::class);
    }

    protected function casts(): array
    {
        return [
            'submitted_at' => 'timestamp',
            'reviewed_at' => 'timestamp',
            'approved_at' => 'timestamp',
        ];
    }
}
