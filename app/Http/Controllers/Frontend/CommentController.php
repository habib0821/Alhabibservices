<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        if (Auth::check()) {


            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if ($validator->fails()) {

                return redirect()->back()->with('message', 'Comment Area Is Mendatory');
            }



            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Commented Successfully');
            } else {
                return redirect()->back()->with('message', 'No such Post Found');
            }
        } else {
            return redirect('login')->with('message', 'Login First To Comment');
        }

    }

    public function delete(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            $comment->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Comment Deleted Successfully'
            ]);

        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete the comment'
            ]);
        }
    }

}
