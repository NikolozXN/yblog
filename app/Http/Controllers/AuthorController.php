<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Actions\StorePostAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;

class AuthorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(
            'posts.create',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, StorePostAction $action)
    {
        $post = $action->handle($request);

        Post::create($post);

        return redirect('/')->with('message', 'Post Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (!Gate::allows('post-author', $post)) {
            abort(403, 'Unauthorized');
        }
        $categories = Category::all();
        return view(
            'posts.edit',
            [
                'categories' => $categories,
                'post' => $post
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, StorePostAction $action, Post $post)
    {
        if (!Gate::allows('post-author', $post)) {
            abort(403, 'Unauthorized');
        }
        $Newpost = $action->handle($request);

        $post->update($Newpost);

        return redirect('/')->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!Gate::allows('post-author', $post)) {
            abort(403, 'Unauthorized');
        }
        $post->delete();
        return redirect('/')->with('message', 'Post Deleted Successfully');
    }

    public function manage()
    {
        if (Auth::check()) {
            $posts = Auth::user()->posts;
            return view('posts.manage', [
                'posts' => $posts
            ]);
        } else {
            return back()->with('message', 'You dont have posts');
        }
    }
}
