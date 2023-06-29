<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'profile_id',
        'date', 'name', 'surname', 'email'
    ];
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
