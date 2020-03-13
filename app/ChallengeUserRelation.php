<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeUserRelation extends Model
{
    protected $fillable = [
        'id_user', 'id_challenge', 'codeFileName'
    ];
}
