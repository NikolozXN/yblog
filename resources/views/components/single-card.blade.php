@props(['post'])
<article class="p-6 bg-white mb-0 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between items-center mb-5 text-gray-500">
        <a href="?category={{ $post->category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
            {{ $post->category->name }}
        </a>
        @can('admin')
            <form class="m-0" action="{{ route('posts.delete', $post->slug) }}" method="POST">
                @csrf
                @method('delete')
                <button class="flex gap-2 hover:text-red-500"><svg class=" w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>Delete Post</button>
            </form>
        @endcan
        <span class="text-sm">{{ views($post)->count() }} Views</span>
        <span class="text-sm">Last updated {{ $post->updated_at->diffForHumans() }}</span>
    </div>
    <a href="{{ route('posts.show', $post->slug) }}"
        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}
    </a>
    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $post->excerpt }}</p>
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img class="w-9 h-9 rounded-full"
                src="{{ $post->author->avatar ? asset('/storage/' . $post->author->avatar) : asset('/storage/markup/profile-icon-png-898.png') }}"
                alt="Jese Leos avatar" />
            <a href="/?author={{ $post->author->username }}&{{ http_build_query(request()->except('author', 'page')) }}"
                class="font-medium dark:text-white">
                {{ $post->author->username }}
            </a>
        </div>
        <a href="{{ route('posts.show', $post->slug) }}"
            class="inline-flex items-center font-xs text-blue-600 dark:text-blue-500 hover:underline">
            Read
            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>
