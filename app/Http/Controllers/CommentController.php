<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Events\NewComment;
class CommentController extends Controller
{
   public function index(Post $post)
    {
        return response()->json($post->comments()-with('user')->latest()->get());

    }

    public function store(Request $request, Post $post)
    {
        try{
        $comment = $post->comments()->create([
            'body'  => $request->body,
            'user_id' => Auth()->user()->id
        ]);

       event(new NewComment($comment));
        //$comment = Comment::where('id', $comment->id)->first();
        return redirect()->route("index");
        //return $comment->toJson();
    }
    catch(\Illuminate\Database\QueryException $e)
    {
        return response()->error(["You don't enter any value"], 401);
    }

    }
}
