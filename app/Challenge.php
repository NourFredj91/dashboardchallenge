<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
  /**
    * Get the comments for the challenge.
    */
  public function comments()
 {
     return $this->hasMany('App\Comment');
 }
}
