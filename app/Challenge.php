<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

    protected $fillable = [
        'title',
        'status',
        'deadline',
        'description',
        'winnerName',
        'startDate'
    ];

      /*
        relation many to many
      */

    public function users()
     {
         return $this->belongsToMany(User::class, 'challenge_user_relations');
     }

     /**
     * Get the comments of challenge.
     */
      public function comments()
      {
        return $this->hasMany(Comment::class);
      }
}
