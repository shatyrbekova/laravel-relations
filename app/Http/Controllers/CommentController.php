<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $article = Article::find($request->get('article_id'));
        $article->comments()->save($comment);

        return back();
        //https://appdividend.com/2018/06/20/create-comment-nesting-in-laravel/
    }
}
