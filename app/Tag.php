<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     public function news() {
        return $this->hasMany('App\News', 'tag_id');
    }
}
