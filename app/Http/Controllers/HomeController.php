<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $post = Post::with(['comments.user'])->first();

        $comments = Comment::with(['user'])
            ->where('post_id', $post->id)
            ->whereNotNull('parent_id')
            ->get()
            ->groupBy('parent_id');

        return view('welcome', ['post' => $post, 'comments' => $comments]);
    }
}
