<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Cache;
    use App\Comments;
    use App\Promotion;
    use App\Http\Requests;
    use App\Interviews;
    use App\News;
    use App\User;
    use App\NewsCategory;
   

    class PortalController extends Controller {

        public function __construct()
        {
            
            $newscategories = Cache::remember('newscategories', 10, function() {
            return NewsCategory::with('news')->get();
            });
            view()->share('newscategories', $newscategories);
        }

        public function index()
        
        {   
            $topcoms = User::orderBy('id', 'desc')->take(5)->get();
            $sliders = News::orderBy('created_at', 'desc')->take(3)->get();
            $promotions = Promotion::orderBy('cnt_visit', 'desc')->take(4)->get();
          
            // $news = Cache::remember('news', 60, function() {
            //     return News::orderBy('created_at', 'desc')->paginate(config('portal.posts_per_page'));
            // });
            
            $news = News::orderBy('id', 'desc')->with('users')->with('newscategories')->paginate(config('portal.posts_per_page'));
           
   
            return view('portal.index', ['news' => $news, 'promotions' => $promotions, 'sliders' => $sliders, 'topcoms' => $topcoms]);
        }

        public function newscategory($id){
            
                $newscategory = Cache::remember('newscategory_'.$id, 60, function() use ($id) {
                return NewsCategory::with(['news' => function ($query){$query->orderBy('id', 'desc');}])->findOrFail($id);
            });
            

            return view('portal.newscategory', ['newscategory' => $newscategory]);
        }
        

        public function showallnews(){
            $news = News::orderBy('id', 'desc')->with('users')->with('newscategories')->paginate(config('portal.posts_per_page'));
            return view('portal.allnews', ['news' => $news]);
        }
        

        public function shownewsrecord($id){

            $record = Cache::remember('record_'.$id, 60, function() use ($id) {
                return News::with('users')->with('newscategories')->findOrFail($id);
            });
            $record->comments = Cache::remember('comments_for_record_'.$id, 60, function() use ($id) {
                return Comments::with('user')->where('news_id', $id)->where('approved', 1)->orderBy('created_at', 'desc')->get();
            });
            return view('portal.shownews', compact('record'));
        }
     
        
        
      
    }