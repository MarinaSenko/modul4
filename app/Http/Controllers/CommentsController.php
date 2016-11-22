<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;
    use App\Comments;
    use App\Http\Requests;
    use App\News;
    use App\NewsCategory;

    class CommentsController extends Controller {

        public function store($news_id, Request $request)
        {
            if (empty($request->input('comment'))){
                return redirect('news/' . $news_id)->with('message', 'Пожалуйста, напишите комментарий до отправки.');
            }
            
            
            
            $comment = [
                'comment' => $request->comment,
                'news_id' => $news_id,
                'user_id' => Auth::user()->id,
            ];
            
            $category = NewsCategory::where('name', 'Политика')->first();
            $news = News::all();
            
            
                
            // if (!config('portal.comments_approving')) {
            //     $comment['approved'] = 1;
            // };
            
            
            $post = News::findOrFail($news_id);
            
            if($category->id === $post->newscategory_id) {
                $comment['approved'] = 0;
            } else {
                $comment['approved'] = 1;
            }
            
            
            $post->comments()->create($comment);
            Cache::forget('comments_for_record_' . $news_id);
            $message = config('portal.comments_approving') ? 'Комментарий добавлен и скоро появится на сайте' : 'Комментарий добавлен';
            return redirect('news/' . $news_id)->with('message', $message);
        }

        public function destroy($news_id, $id)
        {
            $comment = Comments::findOrFail($id);
            $comment->delete();
            Cache::forget('comments_for_record_' . $news_id);
            return redirect("news/$news_id")->with('message', 'Комментарий удален');
        }
    }
