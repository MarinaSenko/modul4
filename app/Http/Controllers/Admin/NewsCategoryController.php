<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsCategory;

class NewsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = NewsCategory::with('news')->get();
        return view('admin.newscategories.index', ['newscategories' => $categories]);
    }
    public function show($id)
    {
        $category = NewsCategory::with(['news' => function($query){
            $query->orderBy('id', 'desc');
        }])->find($id);
        return view('admin.newscategories.show', ['category' => $category]);
    }
    public function create()
    {
        return view('admin.newscategories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:3|unique:newscategories'
        ]);
        $category = new NewsCategory;
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/newscategories')->with('message', 'Category created');
    }
    public function edit($id)
    {
        $category = NewsCategory::find($id);
        return view('admin.newscategories.edit', ['category' => $category]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
        $category = NewsCategory::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/newscategories')->with('message', 'Категория обновлена');
    }
    public function destroy($id)
    {
        $category = NewsCategory::with('news')->find($id);
        if(count($category->news) != 0){
            return redirect('/admin/newscategories')->with('message', 'Категория содержит новости, сначала удалите их');
        }
        $category->delete();
        return redirect('/admin/newscategories')->with('message', 'Категория удалена');
    }
}
