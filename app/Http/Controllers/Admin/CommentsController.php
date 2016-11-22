<?php
    namespace App\Http\Controllers\Admin;

    use Illuminate\Support\Facades\Cache;
    use App\Comments;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;

    class CommentsController extends Controller {
        public function index()
        {
            $comments = Comments::with('news')->with('user')->where('approved', 1)->orderBy('created_at', 'desc')->get();
            return view('admin.comments.index', compact('comments'));
        }

        public function notapproved()
        {
            $comments = Comments::where('approved', 0)->with('news')->with('user')->get();
            return view('admin.comments.notapproved', compact('comments'));
        }

        public function approve($id)
        {
            $comment = Comments::findOrFail($id);
            $comment->approved = 1;
            $comment->save();
            Cache::forget('comments_for_record_' . $comment->news_id);
            return redirect('admin/comments/notapproved')->with('message', 'Коммент одобрен');
        }
        
    
        
        public function destroy($id)
        {
            $comment = Comments::findOrFail($id);
            $comment->delete();
            Cache::forget('comments_for_record_' . $comment->news_id);
            return redirect('admin/comments')->with('message', 'Коммент удален');
        }
        

    }
