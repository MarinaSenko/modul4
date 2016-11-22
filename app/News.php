<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use App\Profile;
    use Nicolaslopezj\Searchable\SearchableTrait;
 

    class News extends Model {
        
        use SearchableTrait;
        
        protected $searchable = [
        'columns' => [
            'news.title' => 10,
            'news.body' => 5
            ]
        ];
        
        protected $table = 'news';

        protected $guarded = [];

        public function newscategories()
        {
            return $this->belongsTo('App\NewsCategory', 'newscategory_id');
        }

        public function users()
        {
            return $this->belongsTo('App\User', 'user_id');
        }

        public function comments()
        {
            return $this->hasMany('App\Comments');
        }
        
        public function tags() {
        return $this->belongsToMany('App\Tag', 'news_id');
    }
    
       
    }



