<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::latest()
            ->with('category', 'author')
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
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
}