@props(['post'])
<article class="p-6 bg-white mb-0 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between items-center mb-5 text-gray-500">
        <a href="?category={{ $post->category->slug }}"
            class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
            {{ $post->category->name }}
        </a>
        <span class="text-sm">Last updated {{ $post->updated_at->diffForHumans() }}</span>
    </div>
    <a href="{{ route('posts.show', $post->slug) }}"
        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ $post->title }}
        </a>
    </a>
    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $post->excerpt }}</p>
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img class="w-9 h-9 rounded-full"
                src="{{ $post->author->avatar ? asset('/storage/' . $post->author->avatar) : asset('/storage/markup/profile-icon-png-898.png') }}"
                alt="Jese Leos avatar" />
            <a href="/?author={{ $post->author->username }}" class="font-medium dark:text-white">
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
