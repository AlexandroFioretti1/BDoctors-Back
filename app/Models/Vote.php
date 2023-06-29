<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'vote',
        'date',
        'profile_id'
    ];
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
