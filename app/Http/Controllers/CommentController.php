<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();
        $validated['post_id'] = $post->id;
        $validated['user_id'] = Auth::user()->id;
        Comment::create($validated);
        return back()->with('message', 'Comment added successfully');
    }

    public function destroy(Post $post, Comment $comment)
    {
        if ($comment->post_id === $post->id && Gate::allows('comment-author', $comment)) {

            $comment->delete();

            // Delete the comment
            return back()->with('message', 'Comment deleted successfully');
        }
        return back()->with('message', 'It is not your comment');
    }
}
