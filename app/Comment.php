<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


      /**
       * Get the challenge that owns the comment.
       */
      public function challenge()
      {
        return $this->belongsTo(Challenge::class);
     }
}
