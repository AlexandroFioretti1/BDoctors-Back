<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
    'slug',
    'phone_number',
    'address',
    'doctor_image',
    'cv',
    'performances',
    'user_id'
    ];

    //generate SLUG function
    public static function generateSlug($name, $surname) {
        $completeName = ($name . ' ' . $surname) ;

        $slug = Str::slug($completeName, '-');
        return $slug;
    }
    //Lorenzo:Link to table 'User' 1to1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Lorenzo:Link to table 'Votes' 1tomany
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
    //Lorenzo:Link to table 'Reviews' 1tomany
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    //Lorenzo:Link to table 'Sponsors' manytomany
    public function sponsors():BelongsToMany{

        return $this->belongsToMany(Sponsor::class);
    }
    //Lorenzo:Link to table 'Specialiyations' manytomany
    public function specializations():BelongsToMany{

        return $this->belongsToMany(Specialization::class);
    }
}