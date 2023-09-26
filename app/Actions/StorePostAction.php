<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class StorePostAction
{
    public function handle($request): array
    {
        $validatedPost = $request->validated();
        $validatedPost['excerpt'] = Str::limit($validatedPost['body'], 200, '...');
        $validatedPost['slug'] = SlugService::createSlug(Post::class, 'slug', $validatedPost['title'], ['unique' => 'true']);
        if ($request->hasFile('image')) {
            $validatedPost['image'] = $request->file('image')->store('images', 'public');
        }
        $validatedPost['user_id'] = Auth::user()->id;

        return $validatedPost;
    }
}
