<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'newscategories';

    public function news() {
        return $this->hasMany('App\News', 'newscategory_id');
    }
}
