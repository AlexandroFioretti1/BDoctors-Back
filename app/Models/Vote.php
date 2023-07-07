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

    //Lorenzo:Link to table 'Profile' 1tomany
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($vote) {
            $profile = Profile::find($vote->profile_id);
            $averageVote = round($profile->votes()->avg("vote"), 1);
            $profile->average_vote = intval($averageVote);
            $profile->save();
        });
    }
}
