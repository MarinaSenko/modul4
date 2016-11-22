<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Comments extends Model {

        protected $fillable = ['comment', 'approved', 'user_id', 'news_id'];

        public function news()
        {
            return $this->belongsTo('App\News');
        }

        public function user()
        {
            return $this->belongsTo('App\User');
        }
    }
