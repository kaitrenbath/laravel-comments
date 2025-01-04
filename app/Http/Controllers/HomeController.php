<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $post = Post::with(['comments.user', 'comments.replies.user'])->first();

        return view('welcome', [
            'post' => $post,
        ]);
    }
}
