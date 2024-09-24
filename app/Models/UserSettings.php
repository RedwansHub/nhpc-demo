<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'locale',
        'timezone',
        'created_by',
        'updated_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
