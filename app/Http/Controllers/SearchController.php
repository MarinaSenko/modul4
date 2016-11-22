<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;
use App\Http\Requests;

class SearchController extends Controller {
    
    
    public function find(Request $request)
{
    return News::search($request->get('q'))->with('body')->get();
}
    
    public function query (Request $request) {
        
        $news = News::search($request->get('q'))->take(5)->get();
        return view('portal.search_result')->with(['news' => $news]);
    }
    

}
