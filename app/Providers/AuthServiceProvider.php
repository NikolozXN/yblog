<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use id;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('post-author', fn (User $user, Post $post) => $user->id === $post->user_id);

        Gate::define('comment-author', fn (User $user, Comment $comment) => $user->id === $comment->user_id || $user->id === $comment->post->user_id);

        Gate::define('admin', fn (User $user) => $user->is_admin === 1);
    }
}
