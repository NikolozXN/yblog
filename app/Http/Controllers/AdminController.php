<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $allUsers = User::withCount('posts', 'comments')->get();
        $allPosts = Post::all();
        $allFeedbacks = Feedback::all();
        $allComments = Comment::all();

        return view('admin.index', ['allUsers' => $allUsers, 'allPosts' => $allPosts, 'allFeedbacks' => $allFeedbacks, 'allComments' => $allComments]);
    }

    public function destroy(User $user)
    {

        $user->delete();

        return redirect('/admin')->with('message', 'User Deleted Successfully');
    }
}
