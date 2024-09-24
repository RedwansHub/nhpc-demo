<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'language_id',
        'country_name',
        'country_flag',
        'country_shortcode',
        'continent',
        'phone_code',
    ];

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
