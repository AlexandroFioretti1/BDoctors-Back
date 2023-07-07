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
        'time',
        'profile_id',
    ];

    //Lorenzo:Link to table 'Profile' 1tomany
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
