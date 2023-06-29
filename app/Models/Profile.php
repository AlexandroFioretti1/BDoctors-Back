<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
    'slug',
    'phone_number',
    'address',
    'doctor_image',
    'cv',
    'perfomances',
    'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function sponsors():BelongsToMany{
        return $this->belongsToMany(Sponsor::class);
    }
    public function specializations():BelongsToMany{
        return $this->belongsToMany(Specialization::class);
    }
}
