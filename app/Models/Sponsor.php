<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','duration'
    ];
    //Lorenzo:Link to table 'Profiles' manytomany
    public function profiles():BelongsToMany{

        return $this->belongsToMany(Profile::class);

    }
}
