<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name_surname',
        'text',
        'user_id',
        'date',
        'email'
    ];
   /**
    * Get the user that owns the Message
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    
    //Lorenzo:Link to table 'Users' 1to1
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }
}
