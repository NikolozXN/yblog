<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Feedback;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['category', 'search', 'author']))
            ->paginate(6)
            ->withQueryString();

        $feedbacks = Feedback::with('author')->get();
        return view(
            'posts.index',
            [
                'posts' => $posts,
                'feedbacks' => $feedbacks
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        views($post)->cooldown(now()->addHours(24))->record();
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
}
