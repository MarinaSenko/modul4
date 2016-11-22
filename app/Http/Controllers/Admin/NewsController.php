<?php
    namespace App\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cache;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\News;
    use App\Tag;
    use App\NewsCategory;

    class NewsController extends Controller {

        private $cats = [];
        private $tags = [];


        public function __construct()
        {
            $this->middleware('auth');
            $this->cats = $this->getCategories();
            $this->tags = $this->getTags();
        }

        public function index()
        {
            $news = News::with('newscategories')->with('users')->orderBy('id', 'desc')->get();
            return view('admin.news.index', ['news' => $news]);
        }

        public function show($id)
        {
            $record = News::findOrFail($id);
            return view('admin.news.show', ['record' => $record]);
        }

        public function create()
        {
            if (count($this->cats) == 0) {
                return redirect('admin/newscategories')->with('message',
                    'У вас нет категорий');
            }
            return view('admin.news.create', ['cats' => $this->cats, 'tags' => $this->tags]);
        }

        public function store(Request $request)
        {
            $this->validateRecord($request);
            $this->uploadPicture($request);
            $request->user()->news()->create($this->getFields($request));
            Cache::flush();
            return redirect('admin/news')->with('message', 'Новость добавлена');
        }

        public function edit($id)
        {
            $record = News::findOrFail($id);
            return view('admin.news.edit', ['record' => $record, 'cats' => $this->cats]);
        }

        public function update(Request $request, $id)
        {
            $record = News::findOrFail($id);
            $this->validateRecord($request);
            $this->uploadPicture($request, $record);
            $request->user()->news()->where('id', '=', $id)->update($this->getFields($request));
            Cache::flush();
            return redirect('admin/news')->with('message', 'Новость изменена');
        }

        public function destroy($id)
        {
            $record = News::findOrFail($id);
            $record->delete();
            Cache::flush();
            return redirect('/admin/news')->with('message', 'Новость удалена');
        }


        private function getCategories()
        {
            $categories = NewsCategory::all();
            $cats = [];
            foreach ($categories as $category) {
                $cats[$category->id] = $category->name;
            }
            return $cats;
        }
        
        private function getTags()
        {
            $tags = [];
            $tags = Tag::all();
            
            foreach ($tags as $tag) {
                $tags[$tag->id] = $tag->name;
            }
            return $tags;
        }

        private function validateRecord(Request $request)
        {
            return $this->validate($request, [
                'title'       => 'required|min:5|max:255',
                'description' => 'required|min:10|max:255',
                'body'        => 'required|min:50|max:5000',
                'is_analitic'         => 'required',
                'picture'     => 'required_without:pic|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024'
            ], [
                'required_without' => 'Изображение обязательно'
            ]);
        }

        private function getFields(Request $request)
        {
            return [
                'title'           => $request->title,
                'body'            => $request->body,
                'is_analitic'     => $request->is_analitic,
                'newscategory_id' => $request->newscategory_id,
                'tag_id'          => $request->tag_id,
                'picture'         => $request->picture
            ];
        }

        private function uploadPicture(Request $request, $record = null)
        {
            if ($request->hasFile('picture')) {
                $request->picture = strtolower(date('YmdHis') . '_' . $request->file('picture')->getClientOriginalName());
                $request->file('picture')->move(base_path() . '/public/images/news/', $request->picture);
                return true;
            }
            $request->picture = $record->picture;
            return true;
        }
    }
