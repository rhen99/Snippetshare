<?php

namespace App;
use App\User;
use App\Snippet;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function snippet(){
        return $this->belongsTo('App\Snippet');
    }
}
