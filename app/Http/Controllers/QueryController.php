<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;

class QueryController extends Controller
{
    public function search(Request $request)
{

    $query = Request::input('search');
    
    
    $articles = News::where('title', 'LIKE', '%' . $query . '%')->paginate(5);

    return view('partials.search', compact('articles', 'query'));
 }
}
