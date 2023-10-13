<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        //allow access for only admin
        Gate::authorize('admin');

        return view('admin.index', [
            'allUsers' => User::withCount('posts', 'comments')->where('is_admin', '!===', 1)->get(),
            'allPosts' => Post::all(),
            'allFeedbacks' => Feedback::with('author')->get(),
            'allComments' => Comment::with('author')->get()
        ]);
    }

    public function showPosts()
    {
        //allow access for only admin
        Gate::authorize('admin');

        $posts = Post::filter(request(['category', 'search', 'author']))
            ->paginate(6)
            ->withQueryString();

        return view('admin.posts', ['posts' => $posts]);
    }

    public function showFeedbacks()
    {
        Gate::authorize('admin');

        $feedbacks = Feedback::with('author')->get();

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks
        ]);
    }
    public function destroy(User $user)
    {
        Gate::authorize('admin');

        $user->delete();

        return redirect('/admin')->with('message', 'User Deleted Successfully');
    }
}
