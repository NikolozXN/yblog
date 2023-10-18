<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CreateCategoryRequest;

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
        $user['deleted_at'] = $user['updated_at'];
        $user->update();
        return redirect('/admin')->with('message', 'User Deleted Successfully');
    }

    public function manageCategory()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function createCategory(CreateCategoryRequest $request)
    {

        $category = $request->validated();
        $category['slug'] = Str::slug($category['name']);
        Category::create($category);
        return redirect('admin/categories')->with('message', 'Category created!');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return back()->with('message', 'Category deleted successfully');
    }
}
