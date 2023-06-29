<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
