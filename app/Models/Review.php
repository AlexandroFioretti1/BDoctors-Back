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
        'date', 
        'name',
         'surname',
          'email'
    ];
    //Link to table 'profile' 1tomany
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($review) {
            $profile = Profile::find($review->profile_id)/* ->reviews()->count("review") */;
            $profile->counter_reviews ++;
            $profile->save();
        });
    }
}
